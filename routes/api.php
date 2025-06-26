<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectTopicController;

// Example API route
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello from API!']);
});
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});


Route::get('/subject-list', [SubjectController::class, 'index']);
Route::get('/subject-topics',[SubjectTopicController::class, 'index']);