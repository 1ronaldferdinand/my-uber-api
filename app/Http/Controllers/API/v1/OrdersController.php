<?php

namespace App\Http\Controllers\API\v1;

use App\Helpers\ResponseHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersRequest;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function order(OrdersRequest $request){
        $validate = $request->validated();

        $distance = $validate['distance'];

        // Check if the date string matches the expected format
        if (!Carbon::hasFormat($validate['deadline'], 'Y-m-d\TH:i:s')) {
            return ResponseHandler::createResponse(400, 'Deadline value is in invalid format');
        }

        // Parse the date string
        $deadline = Carbon::parse($validate['deadline']);

        if ($deadline->lt(Carbon::now())) {
            return ResponseHandler::createResponse(400, 'Unable to deliver before the deadline');
        }

        DB::beginTransaction();

        try {
            $pigeonsController = new PigeonsController();
            $pigeons = $pigeonsController->findAvailablePigeon($request);
            $availablePigeons = [];
            $canDeliverBeforeDeadline = false;

            foreach ($pigeons as $pigeon) {
                // Calculate total time needed for the pigeon
                $timeToDeliver = $distance / $pigeon['speed'];
                $totalTimeNeeded = $timeToDeliver + $pigeon['downtime'];

                // Calculate the start and end times of the tolerance window
                $toleranceStart = $deadline->copy()->subHours($totalTimeNeeded)->addSeconds(1);
                $toleranceEnd = $deadline->copy()->addHours($totalTimeNeeded)->subSeconds(1);

                // Check if there is already an order with the same pigeon and deadline within the tolerance window
                $existingOrder = Orders::where('pigeon_id', $pigeon['id'])
                    ->whereBetween('deadline', [$toleranceStart, $toleranceEnd])
                    ->first();

                if ($existingOrder) {
                    continue;
                }

                // Check total time needed is under the deadline or not
                if ($totalTimeNeeded <= $this->calculateHoursUntilDeadline($deadline)) {
                    $canDeliverBeforeDeadline = true;
                    $availablePigeons[] = $pigeon;
                }
            }

            if ($canDeliverBeforeDeadline) {
                // Calculate the cost
                $cost = $distance * $availablePigeons[0]['cost'];

                // Save the order
                $data = Orders::create([
                    'pigeon_id'  => $availablePigeons[0]['id'],
                    'code'       => $this->generateOrderCode(),
                    'cost'       => $cost,
                    'distance'   => $validate['distance'],
                    'deadline'   => $validate['deadline'],
                    'created_at' => now() 
                ]);

                DB::commit();
                return ResponseHandler::createResponse(200, 'Successfully save the order', $data);
            }
            
            DB::rollBack();
            return ResponseHandler::createResponse(400, 'Unable to deliver before the deadline or within range');
        } catch (\Throwable $th) {
            DB::rollBack();
            return ResponseHandler::createResponse(400, $th->getMessage());
        }
    }

    private function calculateHoursUntilDeadline($deadline)
    {
        // Calculate how many hours from now to deadline
        $now = Carbon::now();
        return $now->diffInHours($deadline);
    }

    public static function generateOrderCode($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        // Generate order's code using random string
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }
}
