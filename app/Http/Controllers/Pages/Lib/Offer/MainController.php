<?php

namespace App\Http\Controllers\Pages\Lib\Offer;

use App\Contracts\Offer\CreatesOffers;
use App\Contracts\Offer\UpdatesOffers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\StoreRequest;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('pages.lib.offer.index', [
            'title' => 'Список документов',
            'items' => Offer::latest()->paginate(24)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('pages.lib.offer.create', [
            'title' => 'Создание элемента в список документов'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Offer\StoreRequest $request
     * @param \App\Contracts\Offer\CreatesOffers $offerCreator
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request, CreatesOffers $offerCreator): RedirectResponse
    {
        $item = $offerCreator->create($request->validated());
        toastSuccess('Новый элемент #'.$item->id.' в список документов успешно добавлен');
        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\View\View
     */
    public function show(Offer $offer)
    {
        if (!$offer->is_published) {
            abort(404);
        }
        return view('pages.lib.offer.show', [
            'title' => $offer->title,
            'item' => $offer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\View\View
     */
    public function edit(Offer $offer): View
    {
        return view('pages.lib.offer.update', [
            'title' => 'Изменение элемента #' . $offer->id . ' из списка документов',
            'item' => $offer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Offer\StoreRequest $request
     * @param \App\Models\Offer $offer
     * @param \App\Contracts\Offer\UpdatesOffers $offerUpdater
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreRequest $request, Offer $offer, UpdatesOffers $offerUpdater)
    {
        $item = $offerUpdater->update($offer, $request->validated());
        toastSuccess('Элемент #'.$item->id.' из списка документов успешно изменен');
        return redirect()->route('offers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        toastSuccess('Элемент из списка документов успешно удален');
        return back();
    }
}
