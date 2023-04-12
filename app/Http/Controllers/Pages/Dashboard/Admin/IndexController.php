<?php

namespace App\Http\Controllers\Pages\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.dashboard.admin', [
            'title' => 'Кабинет Админа',
            'user' => auth()->user()
        ]);
    }
}
