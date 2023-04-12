<?php

namespace App\Http\Controllers\API\V1\Feedback;

use App\Contracts\Feedback\CreatesFeedbacks;
use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\StoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FeedbackStoreController extends Controller
{
    public function __invoke(StoreRequest $request, CreatesFeedbacks $feedbackCreator): JsonResponse
    {
        $feedback = $feedbackCreator->create($request->validated());
        return response()->json([
            'status_code' => Response::HTTP_CREATED,
            'message' => 'Спасибо, наш менеджер свяжется с вами в ближайшее время!',
            'data' => $feedback
        ], Response::HTTP_CREATED);
    }
}
