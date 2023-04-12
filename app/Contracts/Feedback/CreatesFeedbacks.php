<?php

namespace App\Contracts\Feedback;

use App\Models\Feedback;

interface CreatesFeedbacks
{
    /**
     * Create a new feedback.
     *
     * @param array $credentials
     * @return \App\Models\Feedback
     */
    public function create(array $credentials): Feedback;
}
