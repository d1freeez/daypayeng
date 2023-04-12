<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.main.home', [
            'title' => 'Авансовый сервис',
            'user' => auth()->user()
        ]);
    }
}
