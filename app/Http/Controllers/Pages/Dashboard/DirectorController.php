<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DirectorController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.dashboard.director', [
            'title' => 'Кабинет директора'
        ]);
    }
}
