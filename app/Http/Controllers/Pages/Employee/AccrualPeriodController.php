<?php

namespace App\Http\Controllers\Pages\Employee;

use App\Contracts\Advances\AdvanceAccrualsForPeriod;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\AccrualPeriodRequest;
use App\Models\Employee;
use Carbon\CarbonPeriod;
use Illuminate\Http\RedirectResponse;

class AccrualPeriodController extends Controller
{
    public function __invoke(AccrualPeriodRequest $request, Employee $employee, AdvanceAccrualsForPeriod $accrualsForPeriod): RedirectResponse
    {
        $dates = CarbonPeriod::between($request->get('start_date'), $request->get('end_date'));
        $accrualsForPeriod->accrual($employee, $dates);
        toastSuccess('Аванс начислен за период с '. $request->get('start_date') . ' до ' . $request->get('end_date'));
        return back();
    }
}
