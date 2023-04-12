<?php

namespace App\Actions\SuperManager;

use App\Contracts\SuperManager\CreatesSuperManagers;
use App\Enums\UserType;
use App\Helper\HasCredentials;
use App\Models\SuperManager;

class CreateSuperManager implements CreatesSuperManagers
{
    use HasCredentials;

    /**
     * @inheritDoc
     */
    public function create(array $credentials): SuperManager
    {
        $credentials = $this->fullNameCredential($credentials);
        return SuperManager::query()->create([
            ...$credentials,
            'type_id' => UserType::SUPER_MANAGER->value,
            'password' => bcrypt($credentials['password'])
        ]);
    }
}
