<?php

namespace App\Actions\FAQ;

use App\Contracts\FAQ\CreatesFAQs;
use App\Models\Faq;

class CreateFAQ implements CreatesFAQs
{
    /**
     * @inheritDoc
     */
    public function create(array $credentials): Faq
    {
        return Faq::query()->create($credentials);
    }
}
