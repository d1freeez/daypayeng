<?php

namespace App\Http\Controllers\Pages\Auth\Verification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailSentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request): View
    {
        return view('pages.auth.email_sent', [
            'title' => 'Письмо отправлено'
        ]);
    }
}
