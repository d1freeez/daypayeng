<?php

namespace App\Http\Controllers\API\V1\FAQ;

use App\Http\Controllers\Controller;
use App\Models\FaqParent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    private FaqParent $parent;

    public function __construct(FaqParent $parent)
    {
        $this->parent = $parent;
    }

    public function index(Request $request): JsonResponse
    {
        $items = $this->parent->legal()->get();
        if ($request->has('is_employee')) {
            $items = $this->parent->employee()->get();
        }
        return response()->json($items);
    }

    public function show(FaqParent $parent): JsonResponse
    {
        $items = $parent->faqs;
        return response()->json($items);
    }
}
