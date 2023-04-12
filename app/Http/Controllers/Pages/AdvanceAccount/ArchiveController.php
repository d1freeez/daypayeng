<?php

namespace App\Http\Controllers\Pages\AdvanceAccount;

use App\Exports\AdvancesExport;
use App\Http\Controllers\Controller;
use App\Models\AdvanceAccount;
use App\Models\Bring;
use App\Models\Employee;
use App\Models\LibCompany;
use Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ArchiveController extends Controller
{
    /**
     * Display advanced accounts archive list from the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request): View|BinaryFileResponse
    {
        $this->authorize('viewArchive', AdvanceAccount::class);
        if ($request->get('export')) {
            return Excel::download(new AdvancesExport(), 'advances.xlsx');
        }

        return view('pages.advance-account.archive', [
            'title' => 'Архив выплат',
            'items' => AdvanceAccount::filterByRole()->filter()->latest()->paginate(24),
            'companies' => LibCompany::all(),
            'employees' => Employee::filterByRole()->get()
        ]);
    }

    /**
     * Deleting advance account from database.
     *
     * @param \App\Models\AdvanceAccount $account
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(AdvanceAccount $account): RedirectResponse
    {
        $this->authorize('delete', $account);
        $account->delete();
        toastSuccess('Элемент списка "Архив выплат" удален');
        return redirect()->route('accounts.archive');
    }
}
