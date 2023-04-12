<?php

namespace App\Http\Controllers\Ajax;

use App\Models\FaqParent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FilterFaqParentsController
{
    public function __invoke(Request $request): JsonResponse
    {
        if ($request->get('is_legal') == 1) {
            $items = FaqParent::where('is_legal', true)->get();
        } else {
            $items = FaqParent::where('is_legal', false)->get();
        }
        return response()->json($items);
    }
}
