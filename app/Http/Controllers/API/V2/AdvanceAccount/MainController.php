<?php

namespace App\Http\Controllers\API\V2\AdvanceAccount;

use App\Contracts\AdvanceAccount\CreatesRequestAdvances;
use App\Http\Controllers\API\V2\BaseController;
use App\Http\Resources\AdvanceAccountCollection;
use App\Http\Resources\AdvanceAccountResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    public function index(Request $request): JsonResponse
    {
        $query = $request
            ->user()
            ->accounts()
            ->completed()
            ->with('company');

        if ($request->has('monthly')) {
            $query->monthly();
        }

        return (new AdvanceAccountCollection(
            AdvanceAccountResource::collection($query->paginate())
        ))->response();
    }

    public function store(Request $request, CreatesRequestAdvances $requestAdvancesCreator): JsonResponse
    {
        $credentials = $request->all();

        if (!$request->has('amount_percents')) {
            $credentials['amount_percents'] = max((float)$credentials['amount'] * 0.035, 300);
        }

        $min = 499;
        $amount = (float) $credentials['amount'] + (float) $credentials['amount_percents'];

        if ($amount > $request->user()->balance) {
            return $this
                ->errorWrongArgs('Ваш баланс не позволяет брать такую сумму!');
        }

        if ($amount < $min) {
            return $this
                ->errorWrongArgs('Минимальная сумма ' . $min . ' T');
        }

        $account = $requestAdvancesCreator->create($credentials);

        return $this->respondWithArray([
            'message' => 'Ваш запрос был выслан для проверки.',
            'data' => new AdvanceAccountResource($account)
        ]);
    }
}
