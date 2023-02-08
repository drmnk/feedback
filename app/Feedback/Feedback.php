<?php

namespace App\Feedback;

class Feedback
{
    public static function store(FeedbackData $feedback, string $transportType, string $storeName)
    {
        $transportName = __NAMESPACE__.'\Transports\\'.ucfirst($transportType);
        $transport = new $transportName();

        return $transport->store($feedback, $storeName);
    }
}
