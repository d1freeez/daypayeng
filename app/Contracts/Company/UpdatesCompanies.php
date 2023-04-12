<?php

namespace App\Contracts\Company;

use App\Models\LibCompany;

interface UpdatesCompanies
{
    /**
     * Update the given company information.
     *
     * @param array $credentials
     * @param \App\Models\LibCompany $company
     * @return array
     */
    public function update(array $credentials, LibCompany $company): array;
}
