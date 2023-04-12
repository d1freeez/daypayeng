<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Model\Tariff\Tariff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TariffController extends Controller
{
    private string $title = 'Список тарфиов';

    public function index(Request $request): View
    {
        $items = Tariff::filter($request)->latest();
        $ar = array();
        $ar['title'] = $this->title;
        $ar['items'] = $items->paginate(24);
        $ar['request'] = $request;

        return view('pages.tariff.index', $ar);
    }

    public function create(Request $request): View
    {
        $ar = array();
        $ar['title'] = trans('table.create_form') .  ' "' . $this->title . '"';
        $ar['request'] = $request;

        return view('pages.tariff.create', $ar);
    }

    function store(Request $request): RedirectResponse
    {
        return $this->save($request, new Tariff(), ' успешно добавлена!');
    }

    function update(Request $request, Tariff $item): View
    {
        $ar = array();
        $ar['title'] = trans('table.edit_form') .  ' "' . $this->title . '"';
        $ar['request'] = $request;
        $ar['item'] = $item;

        return view('pages.tariff.update', $ar);
    }

    function updateStore(Request $request, Tariff $item): RedirectResponse
    {
        return $this->save($request, $item, ' успешно изменено!');
    }

    public function save(Request $request, Tariff $item, $message): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $ar = $request->all();
            $item->superSave($ar);
            $item->touch();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('errors', $e->getMessage() . '. File - ' . $e->getFile() . '. Line - ' . $e->getLine());
        }

        DB::commit();

        return redirect()->route('tariff-list')->with('success', '№ ' . $item->id . ' "' . $this->title . '"'. $message);
    }

    public function destroy(Tariff $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('employee-list')->with('success', 'Элемент списка "' . $this->title . '" удален');
    }
}
