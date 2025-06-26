<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectTopicController;
use App\Http\Controllers\Api\ChapterApiController;
use App\Http\Controllers\API\ChapterQuestionApiController;
use App\Http\Controllers\Api\SubjectApiController;

// Example API route
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello from API!']);
});
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});


Route::get('/subject-list', [SubjectController::class, 'index']);
Route::get('/subject-topics',[SubjectTopicController::class, 'index']);


// Shivam's API routes
    Route::get('/subjects', [SubjectApiController::class, 'GetAllSubject']);
    // http://your-domain.com/api/subjects

    Route::get('/chapters_subject/{subject_id}', [ChapterApiController::class, 'getChaptersBySubject']);
    // http://your-domain.com/api/chapters_subject/1

    Route::get('/chapter-questions/{chapter_id}', [ChapterQuestionApiController::class, 'getQuestionsByChapter']);
    // /api/chapter-questions/5
