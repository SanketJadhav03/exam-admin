<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AllQuestionsController extends Controller
{
    public function index()
    {
        $subjects = Subject::all(); 
        // return $subjects;
        return view('pages.all_questions.index', compact('subjects'));
    }

    // public function show($id)
    // {
    //     // Logic to retrieve a specific question by ID
    //     // For example:
    //     $question = []; // Replace with actual data retrieval logic

    //     return view('all_questions.show', compact('question'));
    // }
}
