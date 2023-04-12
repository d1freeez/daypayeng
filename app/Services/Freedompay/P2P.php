<?php

namespace App\Services\Freedompay;

use Carbon\Carbon;

class P2P extends Contracts\DataContainer
{
    protected string $merchant_id;
    protected string $secret_key;
    protected string $base_url;
    protected int $user_id;
    protected int $order_id;
    protected string $card_id_to;
    protected string $description;
    protected string $post_link;
    protected ?array $request;
    protected float $amount;

    public function __construct()
    {
        $this->merchant_id = config('freedompay.merchant_id');
        $this->secret_key = config('freedompay.p2p_secret_key');
        $this->base_url = config('freedompay.base_url') . '/api/';
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setOrderId(int $order_id): self
    {
        $this->order_id = $order_id;
        return $this;
    }

    public function setCardIdTo(string $card_id_to): self
    {
        $this->card_id_to = $card_id_to;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setPostLink(string $post_link): self
    {
        $this->post_link = $post_link;
        return $this;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    protected function sign()
    {
        $request = [
            'pg_amount' => $this->amount,
            'pg_merchant_id' => $this->merchant_id,
            'pg_order_id' => $this->order_id,
            'pg_user_id' => $this->user_id,
            'pg_card_id_to' => $this->card_id_to,
            'pg_description' => $this->description,
            'pg_post_link' => $this->post_link,
            'pg_order_time_limit' => Carbon::now()->addHours(3),
            'pg_salt' => $this->generateSalt()
        ];
        $this->request = $this->generateSig(request: $request, method: 'reg2reg');
    }

    public function credit(): bool
    {
        $this->sign();
        return $this->send('reg2reg');
    }
}
