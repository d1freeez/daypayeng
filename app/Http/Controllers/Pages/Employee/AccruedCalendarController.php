<?php

namespace App\Http\Controllers\Pages\Employee;

use App\Http\Controllers\Controller;
use App\Models\AccruedAdvance;
use App\Models\Employee;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccruedCalendarController extends Controller
{
    public function show(Employee $employee): View
    {
        $start_date = Carbon::now()->firstOfMonth();
        $end_date = Carbon::now()->lastOfMonth();
        return view('pages.employee.accrual_calendar', [
            'title' => 'Календарь начислений '.$employee->full_name,
            'advances' => $employee->accruedAdvances()->monthly()->get(),
            'employee' => $employee,
            'date_period' => CarbonPeriod::dates($start_date, $end_date)
        ]);
    }

    public function destroy(Employee $employee, AccruedAdvance $advance)
    {
        $employee->update([
            'balance' => $employee->balance - $advance->amount
        ]);
        $advance->delete();
        toastSuccess('Элемент календаря начислении был отменен');
        return back();
    }
}
