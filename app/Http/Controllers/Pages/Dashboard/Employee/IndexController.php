<?php

namespace App\Http\Controllers\Pages\Dashboard\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $auth_user = Employee::find(auth()->id());
        return view('pages.dashboard.employee', [
            'accounts' => $auth_user->accounts()->latest()->get(),
            'card' => $auth_user->cards()->first(),
            'title' => 'Кабинет работника'
        ]);
    }
}
