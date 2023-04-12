<?php

namespace App\Actions\Application;

use App\Contracts\Application\CreatesApplications;
use App\Models\Application;

class CreateApplication implements CreatesApplications
{
    /**
     * @inheritDoc
     */
    public function create(array $credentials): Application
    {
        return Application::query()->create($credentials);
    }
}
