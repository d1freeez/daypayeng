<?php

namespace App\Http\Controllers\Pages\Lib\Faq;

use App\Contracts\FAQ\CreatesFAQs;
use App\Contracts\FAQ\UpdatesFAQs;
use App\Http\Controllers\Controller;
use App\Http\Requests\FAQ\StoreRequest;
use App\Http\Requests\FAQ\UpdateRequest;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('viewAny', Faq::class);
        return view('pages.faq.index', [
            'title' => 'Список часто задаваемых вопросов',
            'items' => Faq::query()->with('parent')->latest()->paginate(24)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create', Faq::class);
        return view('pages.faq.create', [
            'title' => 'Создание элемента в список часто задаваемых вопросов'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\FAQ\StoreRequest $request
     * @param \App\Contracts\FAQ\CreatesFAQs $FAQsCreator
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request, CreatesFAQs $FAQsCreator)
    {
        $this->authorize('create', Faq::class);
        $item = $FAQsCreator->create($request->all());
        toastSuccess('Новый элемент #'.$item->id.' в список ЧАВо успешно добавлен');
        return redirect()->route('faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Faq $faq): View
    {
        $this->authorize('view', $faq);
        return view('pages.faq.show', [
            'title' => 'Просмотр элемента из списка ЧАВо',
            'item' => $faq
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Faq $faq): View
    {
        $this->authorize('update', $faq);
        return view('pages.faq.update', [
            'item' => $faq,
            'title' => 'Изменение элемента #' . $faq->id . ' из списка ЧАВо'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\FAQ\UpdateRequest $request
     * @param \App\Models\Faq $faq
     * @param \App\Contracts\FAQ\UpdatesFAQs $FAQsUpdater
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, Faq $faq, UpdatesFAQs $FAQsUpdater): RedirectResponse
    {
        $this->authorize('update', $faq);
        $FAQsUpdater->update($faq, $request->validated());
        toastSuccess('Элемент #'.$faq->id.' из списка ЧАВо успешно изменен');
        return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $this->authorize('delete', $faq);
        $faq->delete();
        toastSuccess('Элемент из списка ЧАВо успешно удален');
        return back();
    }
}
