<?php

namespace App\Http\Controllers\API\V1\Bring;

use App\Contracts\Bring\CreatesBrings;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bring\StoreRequest;
use App\Models\Bring;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BringStoreController extends Controller
{
    public function __invoke(StoreRequest $request, CreatesBrings $bringCreator): JsonResponse
    {
        $bring = $bringCreator->create($request->validated());
        return response()->json([
            'status_code' => Response::HTTP_CREATED,
            'data' => $bring,
            'message' => 'Ваша заявка принята! В скором времени мы свяжемся с компанией и подключим Web2Cash!'
        ], Response::HTTP_CREATED);
    }
}
