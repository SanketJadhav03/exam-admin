<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectTopicController;
use App\Http\Controllers\API\BookmarkApiController;
use App\Http\Controllers\Api\ChapterApiController;
use App\Http\Controllers\API\ChapterBookmarkApiController;
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
    // /api/subjects

    Route::get('/chapters_subject/{subject_id}', [ChapterApiController::class, 'getChaptersBySubject']);
    // /api/chapters_subject/1

    Route::get('/chapter-questions/{chapter_id}', [ChapterQuestionApiController::class, 'getQuestionByChapter']);
    // /api/chapter-questions/5

    Route::post('/bookmark', [BookmarkApiController::class, 'storeOrUpdate']);
    // /api/bookmark
