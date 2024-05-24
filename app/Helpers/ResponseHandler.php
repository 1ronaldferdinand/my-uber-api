<?php

    namespace App\Helpers;

    class ResponseHandler{
        protected static $response = [
            'meta' => [
                'status' => "",
                'code' => null,
                'message' => null,
            ],
            'data' => [],
            'errors' => [],
        ];

        public static function createResponse ($code, $message, $data = [], $errors = []){
            self::$response['meta']['status'] = $code == 200 || $code == 201 ? 'success' : 'error'; 
            self::$response['meta']['code'] = $code;
            self::$response['meta']['message'] = $message;
            self::$response['data'] = $data;
            self::$response['errors'] = $errors;

            return response()->json(self::$response, self::$response['meta']['code']);
        } 
    }
