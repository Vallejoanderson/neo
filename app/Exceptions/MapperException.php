<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class MapperException extends Exception
{
    private $statusCode;
    private $messages;
    private $type;

    public function __construct($statusCode = 422, $code = 0, $messages = null, $type = 'error', Exception $exception = null)
    {
        $this->statusCode = $statusCode;
        $this->messages = $messages;
        $this->type = $type;
        parent::__construct($statusCode, $code, $exception);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'status' => $this->type,
            'messages' => $this->messages
        ], $this->statusCode);
    }
}
