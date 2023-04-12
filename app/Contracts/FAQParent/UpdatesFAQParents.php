<?php

namespace App\Contracts\FAQParent;

use App\Models\FaqParent;

interface UpdatesFAQParents
{
    /**
     * Update the given FAQParent information.
     *
     * @param \App\Models\FaqParent $faqParent
     * @param array $credentials
     * @return \App\Models\FaqParent
     */
    public function update(FaqParent $faqParent, array $credentials): FaqParent;
}
