<?php

namespace App\Feedback\Transports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Feedback\FeedbackTrasportInterface;
use App\Feedback\FeedbackData;

class Database implements FeedbackTransportInterface
{
    public function store(FeedbackData $feedback, string $storeName)
    {
        $result = DB::connection($storeName)->insert(
            'insert into feedbacks (id, name, email, body) values (?, ?, ?,?)',
            [Str::uuid(), ...$feedback->asArray()]
        );
    }
}
