<?php

namespace App\Contracts\Company;

use App\Models\LibCompany;

interface CreatesCompanies
{
    /**
     * Create a new company.
     *
     * @param array $credentials
     * @return array
     */
    public function create(array $credentials): array;
}
