<?php

namespace App\Http\Controllers\Pages\Company;

use App\Contracts\Advances\AdvanceAccrualsForPeriod;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\AccrualPeriodRequest;
use App\Models\LibCompany;
use Carbon\CarbonPeriod;
use Illuminate\Http\RedirectResponse;

class AccrualAdvanceController extends Controller
{
    public function __invoke(AccrualPeriodRequest $request, LibCompany $company, AdvanceAccrualsForPeriod $accrualsForPeriod): RedirectResponse
    {
        $this->authorize('accrualAdvance', $company);
        $dates = CarbonPeriod::between($request->get('start_date'), $request->get('end_date'));
        foreach ($company->employees()->with('company')->get() as $employee) {
            $accrualsForPeriod->accrual($employee, $dates);
        }
        toastSuccess('Аванс начислен за период с '. $request->get('start_date') . ' до ' . $request->get('end_date'));
        return back();
    }
}
