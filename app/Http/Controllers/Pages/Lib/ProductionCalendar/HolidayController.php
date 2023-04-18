<?php

namespace App\Http\Controllers\Pages\Lib\ProductionCalendar;

use App\Contracts\Holiday\CreatesHolidays;
use App\Contracts\Holiday\UpdatesHolidays;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductionCalendar\HolidayStoreRequest;
use App\Models\Holiday;
use App\Models\ProductionCalendar;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HolidayController extends Controller
{
    /**
     * @var string
     */
    private string $title = 'Weekends of the production calendar';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('pages.lib.holiday.index', [
            'title' => $this->title,
            'items' => Holiday::query()
                ->with('calendar')
                ->latest()
                ->paginate(24),
            'months' => ProductionCalendar::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ProductionCalendar\HolidayStoreRequest $request
     * @param \App\Contracts\Holiday\CreatesHolidays $createsHolidays
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        HolidayStoreRequest $request,
        CreatesHolidays $createsHolidays
    ): RedirectResponse {
        $item = $createsHolidays->create($request->validated());
        toastSuccess(
            'Новый элемент № ' . $item->id . ' "' . $this->title . '" добавлен'
        );
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Holiday $holiday
     * @return \App\Models\Holiday
     */
    public function show(Holiday $holiday): Holiday
    {
        return $holiday;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProductionCalendar\HolidayStoreRequest $request
     * @param \App\Models\Holiday $holiday
     * @param \App\Contracts\Holiday\UpdatesHolidays $updatesHolidays
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(
        HolidayStoreRequest $request,
        Holiday $holiday,
        UpdatesHolidays $updatesHolidays
    ): RedirectResponse {
        $item = $updatesHolidays->update($holiday, $request->validated());
        toastSuccess(
            'Элемент № ' . $item->id . ' списка "' . $this->title . '" изменен'
        );
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Holiday $holiday
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Holiday $holiday): RedirectResponse
    {
        $holiday->delete();
        toastSuccess('Элемент списка "' . $this->title . '" удален');
        return back();
    }
}
