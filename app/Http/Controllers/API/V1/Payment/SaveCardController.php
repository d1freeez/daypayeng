<?php

namespace App\Http\Controllers\API\V1\Payment;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Paybox\CardStorage\Facade as CardStorage;

class SaveCardController extends Controller
{
    public function __invoke(): void
    {
        $cardStorage = new CardStorage();
        $cardStorage->merchant->id = config('freedompay.merchant_id');
        $cardStorage->merchant->secretKey = config('freedompay.payment_secret_key');
        $cardRequest = array_key_exists('pg_xml', $_REQUEST)
            ? $cardStorage->parseXML($_REQUEST)
            : $_REQUEST;
        if ($cardStorage->checkSig(data: $cardRequest)) {
            if ($cardRequest['pg_status'] == 'success') {
                $item = new Card();
                $item->card_id = $cardRequest['pg_card_id'];
                $item->card_hash = $cardRequest['pg_card_hash'];
                $item->user_id = $cardRequest['pg_user_id'];
                $item->save();
                logger('Card added for user #'.$cardRequest['pg_user_id']);
            } else {
                logger('Error. Request: ' . $cardRequest['pg_status']);
            }
        } else {
            logger('Error. Sig invalid.');
        }
    }
}
