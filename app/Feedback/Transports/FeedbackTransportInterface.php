<?php

namespace App\Feedback\Transports;

use App\Feedback\FeedbackData;

interface FeedbackTransportInterface
{
    public function store(FeedbackData $feedback, string $storeName);
}
