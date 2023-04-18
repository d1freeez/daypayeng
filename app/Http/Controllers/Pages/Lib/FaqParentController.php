<?php

namespace App\Http\Controllers\Pages\Lib;

use App\Contracts\FAQParent\CreatesFAQParents;
use App\Contracts\FAQParent\UpdatesFAQParents;
use App\Http\Controllers\Controller;
use App\Http\Requests\FAQParent\StoreRequest;
use App\Http\Requests\FAQParent\UpdateRequest;
use App\Models\FaqParent;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FaqParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('viewAny', FaqParent::class);
        return view('pages.lib.faq_parent.index', [
            'title' => 'FAQ Category',
            'items' => FaqParent::latest()->paginate(24)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\FAQParent\StoreRequest $request
     * @param \App\Contracts\FAQParent\CreatesFAQParents $FAQParentsCreator
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request, CreatesFAQParents $FAQParentsCreator)
    {
        $this->authorize('create', new FaqParent());
        $item = $FAQParentsCreator->create($request->validated());
        toastSuccess('Новый элемент #'.$item->id.' в список категории FAQ успешно добавлен');
        return redirect()->route('faq-parents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FaqParent $faqParent
     * @return \App\Models\FaqParent
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(FaqParent $faqParent)
    {
        $this->authorize('view', $faqParent);
        return $faqParent;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\FAQParent\UpdateRequest $request
     * @param \App\Models\FaqParent $faqParent
     * @param \App\Contracts\FAQParent\UpdatesFAQParents $FAQParentsUpdater
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, FaqParent $faqParent, UpdatesFAQParents $FAQParentsUpdater): RedirectResponse
    {
        $this->authorize('update', $faqParent);
        $item = $FAQParentsUpdater->update($faqParent, $request->validated());
        toastSuccess('Элемент #'.$item->id.' из списка категории FAQ успешно изменен');
        return redirect()->route('faq-parents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FaqParent $faqParent
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(FaqParent $faqParent)
    {
        $this->authorize('delete', $faqParent);
        $faqParent->faqs()->delete();
        $faqParent->delete();

        toastSuccess('Элемент из списка категории FAQ успешно удален');
        return redirect()->route('faq-parents.index');
    }
}
