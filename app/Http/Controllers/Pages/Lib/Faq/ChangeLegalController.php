<?php

namespace App\Http\Controllers\Pages\Lib\Faq;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;

class ChangeLegalController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Faq $faq): RedirectResponse
    {
        $this->authorize('update', $faq);
        $faq->update([
            'is_legal' => !$faq->is_legal
        ]);
        toastSuccess('Элемент #'.$faq->id.' списка ЧАВо успешно изменен');
        return redirect()->route('faqs.index');
    }
}
