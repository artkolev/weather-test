<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CoordinatesException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'Coordinates not found',
        ], Response::HTTP_BAD_REQUEST);
    }
}
