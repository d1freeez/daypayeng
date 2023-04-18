<?php

namespace App\Http\Controllers\Pages\Lib\ProductionCalendar;

use App\Contracts\ProductionCalendar\CreatesProductionCalendars;
use App\Contracts\ProductionCalendar\UpdatesProductionCalendars;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductionCalendar\MonthStoreRequest;
use App\Http\Requests\ProductionCalendar\MonthUpdateRequest;
use App\Models\ProductionCalendar;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MonthController extends Controller
{
    private string $title = 'Months of the production calendar';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('pages.lib.month.index', [
            'title' => 'Months of the production calendar',
            'items' => ProductionCalendar::query()
                ->latest()
                ->paginate(24)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ProductionCalendar\MonthStoreRequest $request
     * @param \App\Contracts\ProductionCalendar\CreatesProductionCalendars $createsProductionCalendars
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        MonthStoreRequest $request,
        CreatesProductionCalendars $createsProductionCalendars
    ): RedirectResponse {
        $item = $createsProductionCalendars->create($request->validated());
        toastSuccess(
            'New  element № ' . $item->id . ' "' . $this->title . '" added'
        );
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProductionCalendar $month
     * @return \App\Models\ProductionCalendar
     */
    public function show(ProductionCalendar $month): ProductionCalendar
    {
        return $month;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProductionCalendar\MonthUpdateRequest $request
     * @param \App\Models\ProductionCalendar $month
     * @param \App\Contracts\ProductionCalendar\UpdatesProductionCalendars $updatesProductionCalendars
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(
        MonthUpdateRequest $request,
        ProductionCalendar $month,
        UpdatesProductionCalendars $updatesProductionCalendars
    ): RedirectResponse {
        $item = $updatesProductionCalendars->update(
            $month,
            $request->validated()
        );
        toastSuccess(
            'Element № ' . $item->id . ' from list edited to "' . $this->title . ''
        );
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductionCalendar $month
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ProductionCalendar $month): RedirectResponse
    {
        $month->holidays()->delete();
        $month->delete();
        toastSuccess('Element from list "' . $this->title . '" deleted');
        return back();
    }
}
