<?php

namespace App\Console\Commands;

use App\Models\LibCompany;
use Illuminate\Console\Command;

class CleanCompanyCommand extends Command
{
    protected $signature = 'clean:company';

    protected $description = 'Delete all relationships';

    public function handle()
    {
        $companies = LibCompany::onlyTrashed()->get();
        $companies->map(function (LibCompany $company) {
            $company->director()->delete();
            $company->employees()->delete();
            $company->managers()->delete();
            $company->accounts()->delete();
            $company->departments()->delete();
        });
    }
}
