<?php

namespace App\Http\Controllers\Pages\SuperManager;

use App\Contracts\Users\ActivityChangesUsers;
use App\Http\Controllers\Controller;
use App\Models\SuperManager;
use Illuminate\Http\RedirectResponse;

class ActiveController extends Controller
{
    public function __invoke(SuperManager $manager, ActivityChangesUsers $activityChanger): RedirectResponse
    {
        $message = $activityChanger->change($manager);
        toastSuccess('Элемент №' . $manager->id . ' списка супер менеджеров успешно ' . $message);
        return redirect()->route('super-managers.index');
    }
}
