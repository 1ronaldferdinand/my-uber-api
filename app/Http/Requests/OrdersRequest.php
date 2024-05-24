<?php

namespace App\Http\Requests;

use App\Helpers\ResponseHandler;
use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'distance' => 'required|numeric',
            'deadline' => 'required',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = ResponseHandler::createResponse(
            400, 
            'The given data is invalid', 
            $validator->errors()
        );

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
