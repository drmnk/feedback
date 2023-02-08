<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedbackController::class, 'showFeedbackForm'])->name('feedback.showForm');
Route::post('/submit', [FeedbackController::class, 'submitFeedback']);
