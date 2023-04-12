<?php

namespace App\Http\Controllers\Pages\Company;

use App\Actions\Users\ActivityChangeUser;
use App\Http\Controllers\Controller;
use App\Models\LibCompany;
use Illuminate\Http\RedirectResponse;

class ActiveController extends Controller
{
    public function __invoke(LibCompany $company, ActivityChangeUser $activityChanger): RedirectResponse
    {
        $this->authorize('create', LibCompany::class);
        $message = $activityChanger->change($company->director);
        toastSuccess(
            'Элемент №' . $company->id . ' списка компании успешно ' . $message
        );
        return redirect()->route('companies.index');
    }
}
