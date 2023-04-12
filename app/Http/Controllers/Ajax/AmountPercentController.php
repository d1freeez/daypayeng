<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AmountPercentController
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(
            $request->get('amount') * 0.03
        );
    }
}
