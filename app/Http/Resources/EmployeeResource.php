<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'type_name' => $this->type->name,
            'type' => $this->type,
            'balance' => $this->balance,
            'd_amount' => $this->d_amount,
            'm_amount' => $this->m_amount,
            'department_name' => $this->department->name,
            'department_id' => $this->department_id,
            'company_name' => $this->company->name,
            'company_id' => $this->company_id
        ];
    }
}
