<?php


namespace App\Http\Controllers\Pages\Lib\Offer;


use App\Models\Offer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function __invoke(Request $request)
    {
        return view('pages.lib.offer.employee_index', [
            'title' => 'Список документов',
            'items' => Offer::latest()->paginate(24)
        ]);
    }
}
