<?php

namespace App\Services\Freedompay;

use App\Services\Freedompay\Contracts\DataContainer;
use Exception;

class CardStorage extends DataContainer
{
    protected string $merchant_id;
    protected string $secret_key;
    protected string $base_url;
    protected ?string $post_link;
    protected string $back_link;
    protected ?int $user_id;
    protected ?array $request;
    protected ?string $card_id;

    public function __construct()
    {
        $this->merchant_id = config('freedompay.merchant_id');
        $this->secret_key = config('freedompay.payment_secret_key');
        $this->base_url = "https://api.paybox.money/v1/merchant/$this->merchant_id/cardstorage/";
    }

    public function setPostLink(string $post_link): self
    {
        $this->post_link = $post_link;
        return $this;
    }

    public function setBackLink(string $back_link): self
    {
        $this->back_link = $back_link;
        return $this;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setCardId(?string $card_id): self
    {
        $this->card_id = $card_id;

        return $this;
    }

    public function addCard(): bool
    {
        try {
            $request = [
                'pg_merchant_id' => $this->merchant_id,
                'pg_post_link' => $this->post_link,
                'pg_back_link' => $this->back_link,
                'pg_user_id' => $this->user_id,
                'pg_salt' => $this->generateSalt()
            ];
            $this->request = $this->generateSig(request: $request, method: 'add2');
            $this->send(method: 'add2');
        } catch (Exception $exception) {
            logger($exception->getMessage());
            return false;
        } finally {
            return true;
        }
    }

    public function removeCard(): bool
    {
        try {
            $request = [
                'pg_merchant_id' => $this->merchant_id,
                'pg_user_id' => $this->user_id,
                'pg_card_id' => $this->card_id,
                'pg_salt' => $this->generateSalt()
            ];
            $this->request = $this->generateSig(request: $request, method: 'remove');
            $this->send(method: 'remove');
        } catch (Exception $exception) {
            logger($exception->getMessage());
            return false;
        } finally {
            return true;
        }
    }
}
