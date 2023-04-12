<?php

namespace App\Contracts\FAQ;

use App\Models\Faq;

interface CreatesFAQs
{
    /**
     * Create a new faq.
     *
     * @param array $credentials
     * @return \App\Models\Faq
     */
    public function create(array $credentials): Faq;
}
