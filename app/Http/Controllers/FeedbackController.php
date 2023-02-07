<?php

namespace App\Http\Controllers;

use App\Feedback\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFeedbackRequest;
use App\Feedback\FeedbackData;
use Inertia\Inertia;

class FeedbackController extends Controller
{
    public function showFeedbackForm()
    {
        return Inertia::render('FeedbackForm');
    }

    /*
    */
    public function submitFeedback(StoreFeedbackRequest $request)
    {
        $feedback = FeedbackData::fromRequest($request);
        dd($feedback);
        return redirect()->route('feedback.showForm');
    }
}
