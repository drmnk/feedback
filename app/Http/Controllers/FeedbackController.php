<?php

namespace App\Http\Controllers;

use App\Feedback\Feedback;
use App\Feedback\FeedbackData;
use App\Http\Requests\StoreFeedbackRequest;
use Inertia\Inertia;

class FeedbackController extends Controller
{
    public function showFeedbackForm()
    {
        return Inertia::render('FeedbackForm');
    }

    public function submitFeedback(StoreFeedbackRequest $request)
    {
        $feedback = FeedbackData::fromRequest($request);
        $result = Feedback::store($feedback, 'database', 'sqlite');
        $result = Feedback::store($feedback, 'file', 'feedbacks.json');
        if ($result) {
            return redirect()->route('feedback.showForm')->with(
                'message',
                'Заявка успешно отправлена, скоро с вами свяжутся'
            );
        }

        return redirect()->route('feedback.showForm')->with(
            'error',
            'Ошибка при отправке заявки, сорри'
        );
    }
}
