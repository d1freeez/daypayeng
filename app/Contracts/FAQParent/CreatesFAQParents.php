<?php

namespace App\Contracts\FAQParent;

use App\Models\FaqParent;

interface CreatesFAQParents
{
    /**
     * Create a new faq parents.
     *
     * @param array $credentials
     * @return \App\Models\FaqParent
     */
    public function create(array $credentials): FaqParent;
}
