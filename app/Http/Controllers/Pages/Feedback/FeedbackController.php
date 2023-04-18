<?php

namespace App\Http\Controllers\Pages\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('viewAny', Feedback::class);
        return view('pages.feedback.index', [
            'title' => 'Feedback list',
            'items' => Feedback::with('user')->latest()->paginate(24)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Feedback $feedback)
    {
        $this->authorize('show', $feedback);
        return view('pages.feedback.show', [
            'title' => 'Просмотр элемента #' . $feedback->id . ' из списка обратной связи',
            'item' => $feedback
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Feedback $feedback): RedirectResponse
    {
        $this->authorize('delete', $feedback);
        $feedback->delete();
        toastSuccess('Элемент списка из списка обратной связи успешно удален');
        return redirect()->route('feedbacks.index');
    }
}
