<?php

namespace App\Contracts\AdvanceAccount;

use App\Models\AdvanceAccount;

interface CreatesRequestAdvances
{
    /**
     * Create a new advance request.
     *
     * @param array $credentials
     * @return \App\Models\AdvanceAccount
     */
    public function create(array $credentials): AdvanceAccount;
}
