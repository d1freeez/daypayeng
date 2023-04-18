<?php

namespace App\Http\Controllers\Pages\Lib\Location;

use App\Contracts\Country\CreatesCountries;
use App\Contracts\Country\UpdatesCountries;
use App\Http\Requests\Location\CountryStoreRequest;
use App\Models\LibCountry;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function index(): View
    {
        $items = LibCountry::query()
            ->orderBy('created_at', 'desc')
            ->paginate(24);

        return view('pages.lib.country.index', [
            'items' => $items,
            'title' => 'Countries list'
        ]);
    }

    public function store(
        CountryStoreRequest $request,
        CreatesCountries $createsCountries
    ): RedirectResponse {
        $item = $createsCountries->create($request->validated());
        toastSuccess('Новый элемент № ' . $item->id . ' стран создан.');

        return back();
    }

    public function show(LibCountry $country): LibCountry
    {
        return $country;
    }

    public function update(
        CountryStoreRequest $request,
        LibCountry $country,
        UpdatesCountries $updatesCountries
    ): RedirectResponse {
        $item = $updatesCountries->update($request->validated(), $country);
        toastSuccess('Элемент № ' . $item->id . ' списка стран изменен');

        return back();
    }

    public function destroy(LibCountry $country): RedirectResponse
    {
        $country->delete();
        toastSuccess('Элемент списка стран удален');

        return back();
    }
}
