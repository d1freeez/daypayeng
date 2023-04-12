<?php


namespace App\Http\Controllers\Pages\Lib\Offer;


use App\Models\Offer;
use Illuminate\Http\RedirectResponse;

class ChangePublishedController
{
    /**
     * Change published flag for the given offer.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Offer $offer): RedirectResponse
    {
        $offer->update([
            'is_published' => !$offer->is_published
        ]);
        toastSuccess('Элемент #' . $offer->id . ' списка документы успешно изменен');
        return redirect()->route('offers.index');
    }
}
