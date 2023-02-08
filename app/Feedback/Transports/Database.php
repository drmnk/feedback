<?php

namespace App\Feedback\Transports;

use App\Feedback\FeedbackData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Database implements FeedbackTransportInterface
{
    public function store(FeedbackData $feedback, string $storeName)
    {
        $result = DB::connection($storeName)->insert(
            'insert into feedbacks (id, name, email, body) values (?, ?, ?,?)',
            [Str::uuid(), ...$feedback->asArray()]
        );

        return $result;
    }
}
