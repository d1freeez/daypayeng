<?php

namespace App\Actions\Feedback;

use App\Contracts\Feedback\CreatesFeedbacks;
use App\Models\Feedback;

class CreateFeedback implements CreatesFeedbacks
{
    /**
     * @inheritDoc
     */
    public function create(array $credentials): Feedback
    {
        return Feedback::query()->create($credentials);
    }
}
