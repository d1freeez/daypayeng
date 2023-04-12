<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvanceAccountResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'company_name' => $this->company->name,
            'company_id' => $this->company_id,
            'amount' => $this->amount,
            'status' => $this->status,
        ];
    }
}
