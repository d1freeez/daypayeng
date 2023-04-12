<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\AdvanceAccount;
use App\Models\Employee;
use App\Models\LibCompany;
use App\Models\RefundApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Paybox\Pay\Facade as Paybox;

class RefundApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('pages.refund_advance.index', [
            'title' => 'Список заявок на возврат комиссии',
            'items' => RefundApplication::filter()->latest()->paginate(24),
            'employees' => Employee::filterByRole()->get(),
            'companies' => LibCompany::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AdvanceAccount $account
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, AdvanceAccount $account): RedirectResponse
    {
        $ar = $request->all();
        $ar['advance_id'] = $account->id;
        $ar['user_id'] = $request->user()->id;
        RefundApplication::query()->create($ar);
        toastSuccess('Ваш запрос был отправлен. Ожидайте с вами в ближайшее время свяжется наш менеджер');
        return back();
    }

    /**
     * Refund the specified resource.
     *
     * @param \App\Models\RefundApplication $refundApplication
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refund(RefundApplication $refundApplication): RedirectResponse
    {
        $advance = AdvanceAccount::find($refundApplication->advance_id);
        $paybox = new Paybox();
        $paybox
            ->getMerchant()
            ->setId(config('freedompay.merchant_id'))
            ->setSecretKey(config('freedompay.payment_secret_key'));
        $paybox
            ->getPayment()
            ->setId($advance->payment);
        if ($paybox->revoke()) {
            $advance->delete();
            $refundApplication->update([
                'from_user_id' => auth()->id(),
                'is_finished' => true
            ]);
            toastSuccess('Комиссия успешно возвращена!');
        }
        toastError('Вышла ошибка повторите попытку!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RefundApplication $refundApplication
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(RefundApplication $refundApplication): RedirectResponse
    {
        $refundApplication->delete();
        toastSuccess('Элемент из списка заявок на возвращение комиссии успешно был удален.');
        return back();
    }
}
