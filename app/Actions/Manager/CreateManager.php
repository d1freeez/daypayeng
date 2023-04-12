<?php

namespace App\Actions\Manager;

use App\Contracts\Manager\CreatesManagers;
use App\Enums\UserType;
use App\Helper\HasCredentials;
use App\Models\LibCompany;
use App\Models\Manager;

class CreateManager implements CreatesManagers
{
    use HasCredentials;

    /**
     * Create a new manager.
     *
     * @param array $credentials
     * @return \App\Models\Manager
     */
    public function create(array $credentials): Manager
    {
        $credentials = $this->fullNameCredential($credentials);
        $company = $this->getCompany($credentials);
        return $company->managers()->create([
            ...$credentials,
            'type' => UserType::MANAGER,
            'password' => bcrypt($credentials['password'])
        ]);
    }

    protected function getCompany(array $credentials): LibCompany
    {
        return LibCompany::find(
            array_key_exists('company_id', $credentials)
                ? $credentials['company_id']
                : auth()->user()->company_id
        );
    }
}
