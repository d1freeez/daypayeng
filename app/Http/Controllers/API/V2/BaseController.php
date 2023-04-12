<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected int $statusCode = 200;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function noContent(): JsonResponse
    {
        return response()->json(null, 204);
    }

    protected function respondWithError($message, $errors = []): JsonResponse
    {
        if ($this->statusCode === 200) {
            trigger_error(
                "You better have a really good reason for erroring on a 200...",
                E_USER_WARNING
            );
        }

        return $this->respondWithArray([
            'errors' => $errors,
            'message' => $message,
        ]);
    }

    public function respondWithMessage(string $message): JsonResponse
    {
        return $this->setStatusCode(200)
            ->respondWithArray([
                'message' => $message,
            ]);
    }

    public function respondWithArray(array $array, array $headers = []): JsonResponse
    {
        return response()->json($array, $this->statusCode, $headers);
    }

    public function errorForbidden($message = 'Forbidden', $errors = []): JsonResponse
    {
        return $this->setStatusCode(500)
            ->respondWithError($message, $errors);
    }

    public function errorInternalError($message = 'Internal Error', $errors = []): JsonResponse
    {
        return $this->setStatusCode(500)
            ->respondWithError($message, $errors);
    }

    public function errorNotFound($message = 'Resource Not Found', $errors = []): JsonResponse
    {
        return $this->setStatusCode(404)
            ->respondWithError($message, $errors);
    }

    public function errorUnauthorized($message = 'Unauthorized', $errors = []): JsonResponse
    {
        return $this->setStatusCode(401)
            ->respondWithError($message, $errors);
    }

    public function errorWrongArgs($message = 'Wrong Arguments', $errors = []): JsonResponse
    {
        return $this->setStatusCode(400)
            ->respondWithError($message, $errors);
    }
}
