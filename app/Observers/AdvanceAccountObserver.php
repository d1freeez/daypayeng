<?php

namespace App\Observers;

use App\Enums\AdvanceAccountStatus;
use App\Models\AdvanceAccount;
use App\Notifications\AdvanceCredited;

class AdvanceAccountObserver
{
    /**
     * Handle the advance account "updated" event.
     *
     * @param  \App\Models\AdvanceAccount  $advanceAccount
     * @return void
     */
    public function updated(AdvanceAccount $advanceAccount): void
    {
        if ($advanceAccount->status == AdvanceAccountStatus::ON_ACCEPT) {
            $advanceAccount->user->notify(new AdvanceCredited());
        }
    }
}
