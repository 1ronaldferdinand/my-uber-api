<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PigeonsRequest;
use App\Models\Pigeons;
use Illuminate\Http\Request;

class PigeonsController extends Controller
{
    public function findAvailablePigeon(Request $request){
        $distance = $request->distance ?? 0;

        $pigeon = Pigeons::select('*')
                    ->where('range', '>=', $distance)
                    ->get();

        return $pigeon;
    }
}
