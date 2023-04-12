<?php

namespace App\Http\Controllers\API\V1\FAQ;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if (!$request->has('is_employee')) {
            $items = Faq::where('is_legal', true)->get();
        } else {
            $items = Faq::where('is_legal', false)->get();
        }
        return response()->json($items);
    }
}
