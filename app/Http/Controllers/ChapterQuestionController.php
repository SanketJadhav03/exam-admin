<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterQuestion;
use Illuminate\Http\Request;

class ChapterQuestionController extends Controller
{
    public function index($chapterId)
    {
        $subjectId = Chapter::where('chapter_id', $chapterId)->value('subject_id');
        $questions = ChapterQuestion::where('chapter_id', $chapterId)->get();
        return view('pages.all_questions.chapters.chapter_questions.index', compact('questions', 'chapterId', 'subjectId'));
    }   

    public function create($chapterId)
    {
        $subjectId = Chapter::where('chapter_id', $chapterId)->value('subject_id');
        // return $subjectId;
        return view('pages.all_questions.chapters.chapter_questions.create', compact('chapterId', 'subjectId'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'question' => 'required|string',
        'option_a' => 'required|string',
        'option_b' => 'required|string',
        'option_c' => 'required|string',
        'option_d' => 'required|string',
        'correct_answer' => 'required|in:A,B,C,D',
        'chapter_id' => 'required|exists:chapters,chapter_id',
        'subject_id' => 'required|exists:subjects,subject_id',
        'explanation' => 'nullable|string',
    ]);


    ChapterQuestion::create([
        'question' => $request->question,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
        'correct_answer' => $request->correct_answer,
        'explanation' => $request->explanation,
        'chapter_id' => $request->chapter_id,
        'subject_id' => $request->subject_id,
    ]);

    return redirect()->back()->with('success', 'Chapter question added successfully.');
    }

    
}
