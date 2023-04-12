<?php

namespace App\Http\Controllers\Pages\Lib\Location;

use App\Contracts\Region\CreatesRegions;
use App\Contracts\Region\UpdatesRegions;
use App\Http\Requests\Location\RegionStoreRequest;
use App\Models\LibCountry;
use App\Models\LibRegion;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class RegionController extends Controller
{
    /**
     * Retrieving a list of regions and displaying on the index page.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('view', LibRegion::class);

        return view('pages.lib.region.index', [
            'title' => 'Список областей',
            'items' => LibRegion::query()
                ->with('country')
                ->orderBy('created_at', 'desc')
                ->paginate(24),
            'countries' => LibCountry::all()
        ]);
    }

    /**
     * Creating a new element in the list of regions.
     *
     * @param \App\Http\Requests\Location\RegionStoreRequest $request
     * @param \App\Contracts\Region\CreatesRegions $createsRegions
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(
        RegionStoreRequest $request,
        CreatesRegions $createsRegions
    ): RedirectResponse {
        $this->authorize('create', LibRegion::class);

        $item = $createsRegions->create($request->validated());
        toastSuccess(
            'Новый элемент № ' . $item->id . ' списка областей создан.'
        );

        return back();
    }

    /**
     * Retrieving an element from a list of regions.
     *
     * @param \App\Models\LibRegion $region
     * @return \App\Models\LibRegion
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(LibRegion $region): LibRegion
    {
        $this->authorize('view', $region);
        return $region;
    }

    /**
     * Updating an element from a list of regions.
     *
     * @param \App\Http\Requests\Location\RegionStoreRequest $request
     * @param \App\Models\LibRegion $region
     * @param \App\Contracts\Region\UpdatesRegions $updatesRegions
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        RegionStoreRequest $request,
        LibRegion $region,
        UpdatesRegions $updatesRegions
    ): RedirectResponse {
        $this->authorize('update', $region);

        $item = $updatesRegions->update($region, $request->validated());
        toastSuccess('Элемент № ' . $item->id . ' списка областей изменен');

        return back();
    }

    /**
     * Deleting an element from a list of regions.
     *
     * @param \App\Models\LibRegion $region
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(LibRegion $region): RedirectResponse
    {
        $this->authorize('delete', $region);

        $region->delete();
        toastSuccess('Элемент списка областей удален');

        return back();
    }
}
