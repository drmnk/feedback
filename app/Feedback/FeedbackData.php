<?php

namespace App\Feedback;

use App\Http\Requests\StoreFeedbackRequest;

class FeedbackData
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $body
    ) {
    }

    public static function fromRequest(StoreFeedbackRequest $request)
    {
        return new static(
            $request->name,
            $request->email,
            $request->body
        );
    }

    public function asArray()
    {
        return [$this->name, $this->email, $this->body];
    }
}
