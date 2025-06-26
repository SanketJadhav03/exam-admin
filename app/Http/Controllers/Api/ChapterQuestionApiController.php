<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ChapterQuestion;
use Illuminate\Http\Request;

class ChapterQuestionApiController extends Controller
{
    public function getQuestionByChapter($chapter_id)
    {
        $questions = ChapterQuestion::where('chapter_id', $chapter_id)->get();

        if ($questions->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No questions found for this chapter.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Questions fetched successfully.',
            'data' => $questions
        ]);
    }
}
