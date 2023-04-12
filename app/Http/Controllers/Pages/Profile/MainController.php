<?php

namespace App\Http\Controllers\Pages\Profile;

use App\Contracts\Users\ChangesProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        return view('pages.profile.account', [
            'title' => 'Профиль',
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateProfileRequest $request, ChangesProfile $profileChanger): RedirectResponse
    {
        $profileChanger->update($request->user(), $request->validated());
        toastSuccess('Ваш аккаунт успешно изменен!');
        return back();
    }
}
