<?php

namespace App\Http\Controllers\Pages\AdvanceAccount;

use App\Enums\AdvanceAccountStatus;
use App\Http\Controllers\Controller;
use App\Models\AdvanceAccount;
use Illuminate\Http\RedirectResponse;

class AcceptController extends Controller
{
    public function __invoke(AdvanceAccount $account): RedirectResponse
    {
        $this->authorize('accept', $account);
        $account->update([
            'status' => AdvanceAccountStatus::ACCEPTED
        ]);
        toastSuccess('Подтверждение прошла успешно! Спасибо что помогаете нашему сервису.');
        return redirect()->route('advance-account-list');
    }
}
