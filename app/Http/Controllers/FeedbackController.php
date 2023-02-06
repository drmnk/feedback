<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FeedbackController extends Controller
{
    public function showFeedbackForm()
    {
        return Inertia::render('FeedbackForm');
    }
}
