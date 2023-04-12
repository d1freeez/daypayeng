<?php

namespace App\Actions\Company;

use App\Helper\HasCredentials;
use App\Models\LibCompany;

class UpdateCompany implements \App\Contracts\Company\UpdatesCompanies
{
    use HasCredentials;

    /**
     * Update the given company information.
     *
     * @param array $credentials
     * @param \App\Models\LibCompany $company
     * @return array
     */
    public function update(array $credentials, LibCompany $company): array
    {
        $company->update([
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
        $company->director()->update($credentials);
        $this->updatePassword($company->director, $credentials);

        return [$company, $company->director];
    }
}
