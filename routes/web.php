<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

Route::get('/', [FeedbackController::class, 'showFeedbackForm'])->name('feedback.showForm');
Route::post('/submit', [FeedbackController::class, 'submitFeedback']);
