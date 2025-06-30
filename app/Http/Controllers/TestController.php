<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChapterQuestion;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getRandomQuestions(Request $request)
{
    $count = $request->input('count', 50); // Default 50
    $questions = ChapterQuestion::inRandomOrder()->limit($count)->get();

    return response()->json([
        'status' => true,
        'message' => "$count questions fetched successfully",
        'data' => $questions
    ]);
}
}
