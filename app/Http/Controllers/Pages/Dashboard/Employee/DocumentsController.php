<?php

namespace App\Http\Controllers\Pages\Dashboard\Employee;

use App\Http\Controllers\Controller;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use Illuminate\View\View;

class DocumentsController extends Controller
{
    public function __construct(
        protected EmployeeRepositoryInterface $employeeRepository
    )
    {
    }

    public function __invoke(): View
    {
        return view('pages.dashboard.documents', [
            'title' => 'Документы',
            'card' => $this->employeeRepository->getCard()
        ]);
    }
}
