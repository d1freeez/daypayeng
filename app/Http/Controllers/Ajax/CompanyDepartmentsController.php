<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\LibCompany;
use Illuminate\Http\JsonResponse;

class CompanyDepartmentsController extends Controller
{
    public function __invoke(LibCompany $company): JsonResponse
    {
        return response()
            ->json($company->departments);
    }
}
