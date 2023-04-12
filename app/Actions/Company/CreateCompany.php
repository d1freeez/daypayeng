<?php

namespace App\Actions\Company;

use App\Contracts\Company\CreatesCompanies;
use App\Enums\UserType;
use App\Helper\HasCredentials;
use App\Models\LibCompany;
use Str;

class CreateCompany implements CreatesCompanies
{
    use HasCredentials;

    /**
     * Create a new company.
     *
     * @param array $credentials
     * @return array
     */
    public function create(array $credentials): array
    {
        $company = LibCompany::query()->create([
            'name' => $credentials['name'],
            'rg_date' => $credentials['rg_date'],
            'bin' => $credentials['bin'],
            'is_six_day' => key_exists('six_day', $credentials)
        ]);
        $credentials = $this->deleteCredentials(
            'name|rg_date|bin|six_day',
            $credentials
        );
        $credentials = $this->fullNameCredential(
            $credentials
        );
        $director = $company
            ->director()
            ->create([
                ...$credentials,
                'position' => 'Ген. Директор',
                'type' => UserType::DIRECTOR,
                'password' => key_exists('password', $credentials)
                    ? bcrypt($credentials['password'])
                    : bcrypt(Str::random(10)),
                'is_active' => key_exists('is_active', $credentials),
                'email_token' => bcrypt($credentials['email'])
            ]);

        return [$company, $director];
    }
}
