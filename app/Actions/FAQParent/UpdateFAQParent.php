<?php

namespace App\Actions\FAQParent;

use App\Contracts\FAQParent\UpdatesFAQParents;
use App\Models\FaqParent;

class UpdateFAQParent implements UpdatesFAQParents
{
    /**
     * @inheritDoc
     */
    public function update(FaqParent $faqParent, array $credentials): FaqParent
    {
        $faqParent->update([
            'title' => $credentials['title'],
            'is_legal' => array_key_exists('is_legal', $credentials)
        ]);
        return $faqParent;
    }
}
