<?php

namespace App\Http\Controllers\Pages\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;

class ChangeAnsweredController extends Controller
{
    /**
     * Change is_answered flag for the given feedback.
     *
     * @param \App\Models\Feedback $feedback
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Feedback $feedback): RedirectResponse
    {
        $this->authorize('update', $feedback);
        $feedback->update([
            'answered' => !$feedback->answered
        ]);
        toastSuccess('Элемент #'.$feedback->id.' из списка обратная связь успешно изменен');
        return redirect()->route('feedbacks.index');
    }
}
