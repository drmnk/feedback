<?php

namespace App\Feedback\Transports;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Feedback\FeedbackData;

class File implements FeedbackTransportInterface
{
    public function store(FeedbackData $feedback, string $storeName)
    {
        $feedback = json_encode([
            'id' => Str::uuid(),
            'name' => $feedback->name,
            'email' => $feedback->email,
            'body' => $feedback->body
        ]);
        $result = Storage::append($storeName, $feedback);
        return $result;
    }
}
