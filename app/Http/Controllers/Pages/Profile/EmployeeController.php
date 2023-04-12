<?php

namespace App\Http\Controllers\Pages\Profile;

use Illuminate\View\View;

class EmployeeController
{
    public function __invoke(): View
    {
        return view('pages.employee.profile.account', [
            'title' => 'Профиль'
        ]);
    }
}
