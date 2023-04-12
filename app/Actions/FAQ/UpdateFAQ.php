<?php

namespace App\Actions\FAQ;

use App\Contracts\FAQ\UpdatesFAQs;
use App\Models\Faq;

class UpdateFAQ implements UpdatesFAQs
{
    /**
     * @inheritDoc
     */
    public function update(Faq $faq, array $credentials): Faq
    {
        $faq->update($credentials);

        return $faq;
    }
}
