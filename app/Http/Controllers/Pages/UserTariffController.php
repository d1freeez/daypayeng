<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Model\UserTariff;
use App\Repositories\Users\EmployeeRepository;
use App\Repositories\UserTariffRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserTariffController extends Controller
{
    private $title = 'Купленные тарифы';
    /**
     * @var UserTariffRepository
     */
    private $userTariff;
    /**
     * @var EmployeeRepository
     */
    private $employee;

    /**
     * UserTariffController constructor.
     */
    public function __construct()
    {
        $this->userTariff = app(UserTariffRepository::class);
        $this->employee = app(EmployeeRepository::class);
        $this->title = trans('titles.user_tariff_list');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $title = $this->title;
        $items = $this->userTariff->getByRoleFilteredPaginated($request);
        return view('pages.user_tariffs.index', compact('request', 'title', 'items'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function create(Request $request)
    {
        $title = trans('table.create_form') . ' "' . $this->title . '"';
        $employees = $this->employee->all();
        return view('pages.user_tariffs.create', compact('title', 'employees', 'request'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $item = $this->userTariff->create($request->all());
        toastSuccess('Новый элемент #'. $item->id .' в список "' . $this->title . '" успешно добавлен');
        return redirect()->route('user_tariff_list');
    }

    /**
     * @param UserTariff $item
     * @return Factory|View
     */
    public function edit(UserTariff $item)
    {
        $title = trans('table.edit_form') . ' #'. $item->id . ' "'. $this->title . '"';
        return view('pages.user_tariffs.edit', compact('item', 'title'));
    }

    /**
     * @param UserTariff $item
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(UserTariff $item, Request $request)
    {
        $this->userTariff->update($item->id, $request->all());
        toastSuccess('Изменение элемента #'. $item->id .' в список "' . $this->title . '" успешно закончено');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserTariff $item
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(UserTariff $item)
    {
        $item->delete();
        toastSuccess('Элемент списка "' . $this->title . '" успешно удален');
        return back();
    }
}
