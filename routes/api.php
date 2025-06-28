<?php

use App\Http\Controllers\Admin\StudentAuthController as AdminStudentAuthController;
use App\Http\Controllers\Admin\StudentRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectTopicController;
use App\Http\Controllers\API\BookmarkApiController;
use App\Http\Controllers\Api\ChapterApiController;
use App\Http\Controllers\API\ChapterBookmarkApiController;
use App\Http\Controllers\API\ChapterQuestionApiController;
use App\Http\Controllers\API\StudentAuthController;
use App\Http\Controllers\Api\SubjectApiController;


// Example API route
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello from API!']);
});
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});


Route::get('/subject/list', [SubjectController::class, 'index']);
Route::get('/subject/topic',[SubjectTopicController::class, 'index']);


// Shivam's API routes
    Route::get('/subjects', [SubjectApiController::class, 'GetAllSubject']);
    // /api/subjects

    Route::get('/chapters_subject/{subject_id}', [ChapterApiController::class, 'getChaptersBySubject']);
    // /api/chapters_subject/1

    Route::get('/chapter-questions/{chapter_id}', [ChapterQuestionApiController::class, 'getQuestionByChapter']);
    // /api/chapter-questions/5
Route::prefix('student')->group(function () {
    Route::get('google/login', [StudentRegisterController::class, 'redirectToGoogle']);
    Route::get('google/callback', [StudentRegisterController::class, 'handleGoogleCallback']);
});
Route::get('/student/list', [StudentRegisterController::class, 'index']);
Route::post('/student/register', [StudentRegisterController::class, 'store']);

    Route::post('/bookmark', [BookmarkApiController::class, 'storeOrUpdate']);
    // /api/bookmark

    Route::get('/bookmarks/{user_id}', [BookmarkApiController::class, 'getByUser']);
    // /api/bookmarks/1

    Route::delete('/bookmark/{id}', [BookmarkApiController::class, 'destroy']);
    // /api/bookmark/1
