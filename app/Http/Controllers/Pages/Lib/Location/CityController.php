<?php

namespace App\Http\Controllers\Pages\Lib\Location;

use App\Contracts\City\CreatesCities;
use App\Contracts\City\UpdatesCities;
use App\Http\Requests\Location\CityStoreRequest;
use App\Models\LibCity;
use App\Models\LibRegion;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CityController extends Controller
{
    /**
     * Retrieving a list of cities and displaying on the index page.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('view', LibCity::class);

        return view('pages.lib.city.index', [
            'title' => 'Список городов',
            'items' => LibCity::query()
                ->orderBy('created_at', 'desc')
                ->with('region')
                ->paginate(24),
            'regions' => LibRegion::all()
        ]);
    }

    /**
     * Creating a new element in the list of cities.
     *
     * @param \App\Http\Requests\Location\CityStoreRequest $request
     * @param \App\Contracts\City\CreatesCities $createsCities
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(
        CityStoreRequest $request,
        CreatesCities $createsCities
    ): RedirectResponse {
        $this->authorize('create', LibCity::class);

        $item = $createsCities->create($request->validated());
        toastSuccess(
            'Новый элемент № ' . $item->id . ' из списка городов создан'
        );

        return back();
    }

    /**
     * Retrieving an element from a list of cities.
     *
     * @param \App\Models\LibCity $city
     * @return \App\Models\LibCity
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(LibCity $city): LibCity
    {
        $this->authorize('view', LibCity::class);
        return $city;
    }

    /**
     * Updating an element from a list of cities.
     *
     * @param \App\Http\Requests\Location\CityStoreRequest $request
     * @param \App\Models\LibCity $city
     * @param \App\Contracts\City\UpdatesCities $updatesCities
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        CityStoreRequest $request,
        LibCity $city,
        UpdatesCities $updatesCities
    ): RedirectResponse {
        $this->authorize('update', $city);

        $item = $updatesCities->update($city, $request->validated());
        toastSuccess('Элемент № ' . $item->id . ' из списка городов изменен');

        return back();
    }

    /**
     * Deleting an element from a list of cities.
     *
     * @param \App\Models\LibCity $city
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(LibCity $city): RedirectResponse
    {
        $this->authorize('delete', $city);

        $city->delete();
        toastSuccess('Элемент из списка городов удален');

        return back();
    }
}
