<?php

namespace App\Contracts\FAQ;

use App\Models\Faq;

interface UpdatesFAQs
{
    /**
     * Update the given faq information.
     *
     * @param \App\Models\Faq $faq
     * @param array $credentials
     * @return \App\Models\Faq
     */
    public function update(Faq $faq, array $credentials): Faq;
}
