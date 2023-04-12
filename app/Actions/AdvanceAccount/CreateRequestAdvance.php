<?php

namespace App\Actions\AdvanceAccount;

use App\Contracts\AdvanceAccount\CreatesRequestAdvances;
use App\Enums\AdvanceAccountStatus;
use App\Models\AdvanceAccount;

class CreateRequestAdvance implements CreatesRequestAdvances
{
    /**
     * @inheritDoc
     */
    public function create(array $credentials): AdvanceAccount
    {
        $amount = (float) $credentials['amount'] + (float) $credentials['amount_percents'];
        return AdvanceAccount::query()->create([
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company_id,
            'fee' => $credentials['amount_percents'],
            'amount' => $amount,
            'is_company_accepted' => auth()->user()->without_checking,
            'status' => AdvanceAccountStatus::ON_MODERATE,
            'is_commission_paid' => true,
        ]);
    }
}
