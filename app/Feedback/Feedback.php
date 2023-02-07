<?php

namespace App\Feedback;

use App\Feedback\Transports\Database;
use App\Feedback\Transports\Email;
use App\Feedback\FeedbackData;

class Feedback
{
    public static function store(FeedbackData $feedback, string $transportType, string $storeName)
    {
        $transportName = __NAMESPACE__ . '\Transports\\' . ucfirst($transportType);
        $transport = new $transportName();
        return $transport->store($feedback, $storeName);
    }
}
