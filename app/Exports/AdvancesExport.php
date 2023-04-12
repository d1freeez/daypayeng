<?php

namespace App\Exports;

use App\Enums\AdvanceAccountStatus;
use App\Models\AdvanceAccount;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AdvancesExport implements FromView
{
    public function view(): View
    {
        $ar = array();
        $ar['items'] = AdvanceAccount::filter()
            ->filterByRole()
            ->latest()
            ->get();
        $ar['ar_status'] = AdvanceAccountStatus::cases();

        return view('exports.advances', $ar);
    }
}
