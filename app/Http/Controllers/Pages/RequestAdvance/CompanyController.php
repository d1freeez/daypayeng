<?php

namespace App\Http\Controllers\Pages\RequestAdvance;

use App\Enums\AdvanceAccountStatus;
use App\Http\Controllers\Controller;
use App\Models\AdvanceAccount;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Company accept action
     *
     * @param \App\Models\AdvanceAccount $account
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdvanceAccount $account): RedirectResponse
    {
        $account->update([
            'is_company_accepted' => true
        ]);
        toastSuccess('№' . $account->id . ' список запросов аванса успешно одобрена и отправлена на проверку администраторам!');
        return back();
    }

    /**
     * Company reject action
     *
     * @param \App\Models\AdvanceAccount $account
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AdvanceAccount $account, Request $request): RedirectResponse
    {
        $account->update([
            'reason_rejection' => $request->get('reason_rejection'),
            'status' => AdvanceAccountStatus::COMPANY_REJECT,
            'from_user_id' => auth()->id()
        ]);
        toastSuccess('№' . $account->id . ' - успешно отклонено!');
        return back();
    }
}
