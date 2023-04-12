<?php

namespace App\Http\Controllers\API\V1\P2P;

use App\Http\Controllers\Controller;
use App\Models\AdvanceAccount;
use Paybox\CardStorage\Facade as CardStorage;

class ResultController extends Controller
{
    public function __invoke(): void
    {
        $paybox = new CardStorage();
        $paybox->merchant->id = config('freedompay.merchant_id');
        $paybox->merchant->secretKey = config('freedompay.p2p_secret_key');
        $request = array_key_exists('pg_xml', $_REQUEST)
            ? $paybox->parseXML($_REQUEST)
            : $_REQUEST;
        if ($paybox->checkSig(data: $request)) {
            if ($request['pg_payment_status'] == 'success') {
                AdvanceAccount::find($request['pg_order_id'])->update([
                    'payed_at' => $request['pg_payment_date']
                ]);
            }
        }
    }
}
