<?php

namespace App\Http\Controllers\Pages\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        return request()->user()->redirectToDashboard();
    }
}
