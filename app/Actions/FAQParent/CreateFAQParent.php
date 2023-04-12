<?php

namespace App\Actions\FAQParent;

use App\Contracts\FAQParent\CreatesFAQParents;
use App\Models\FaqParent;

class CreateFAQParent implements CreatesFAQParents
{
    /**
     * @inheritDoc
     */
    public function create(array $credentials): FaqParent
    {
        return FaqParent::query()->create([
            'title' => $credentials['title'],
            'is_legal' => array_key_exists('is_legal', $credentials)
        ]);
    }
}
