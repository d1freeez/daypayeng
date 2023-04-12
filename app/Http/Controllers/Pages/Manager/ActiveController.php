<?php

namespace App\Http\Controllers\Pages\Manager;

use App\Contracts\Users\ActivityChangesUsers;
use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\RedirectResponse;

class ActiveController extends Controller
{
    public function __invoke(Manager $manager, ActivityChangesUsers $activityChangesUsers): RedirectResponse
    {
        $message = $activityChangesUsers->change($manager);
        toastSuccess(
            'Элемент #' . $manager->id . ' списка менеджеров успешно ' . $message
        );
        return redirect()->route('managers.index');
    }
}
