<?php

namespace App\Http\Controllers\Pages\AdvanceAccount;

use App\Enums\AdvanceAccountStatus;
use App\Http\Controllers\Controller;
use App\Models\AdvanceAccount;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', AdvanceAccount::class);
        $title = 'Список выплат';
        $items = AdvanceAccount::filter()->filterByRole()->latest()->paginate(24);
        $not_accepted_status = AdvanceAccountStatus::ON_ACCEPT;
        $rejected_status = AdvanceAccountStatus::COMPANY_REJECT;
        return view('pages.advance-account.index', compact('items', 'title', 'not_accepted_status', 'rejected_status'));
    }
}
