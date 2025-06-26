<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index($id)
    {
        
        $chapters = Chapter::where('subject_id', $id)->orderBy('chapter_id', 'asc')->get();
        $subject_id = $id;
        return view('pages.all_questions.chapters.index', compact('chapters','subject_id'));
    }

    public function create($subject_id)
    {
        $subject_id = $subject_id; 
        return view('pages.all_questions.chapters.create',compact('subject_id'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'chapter_name' => 'required|string',
        'status' => 'required|in:active,inactive',
        'subject_id' => 'required|exists:subjects,subject_id',
    ]);

    $chapter =Chapter::create([
        'chapter_name' => $request->chapter_name,
        'status' => $request->status,
        'subject_id' => $request->subject_id,
    ]);
    return redirect()->route('chapters.index', $request->subject_id)->with('success', 'Chapter created successfully.');
    }


    // Show edit form
    public function edit($chapter_id)
    {
    $chapter = Chapter::findOrFail($chapter_id);
    return view('pages.all_questions.chapters.edit', compact('chapter'));
    }

    public function update(Request $request, $chapter_id)
    {
    $request->validate([
        'chapter_name' => 'required|string',
        'status' => 'required|in:active,inactive',
    ]);

    $chapter = Chapter::findOrFail($chapter_id);
    $chapter->update([
        'chapter_name' => $request->chapter_name,
        'status' => $request->status,
    ]);

    return redirect()->route('chapters.index', $chapter->subject_id)->with('success', 'Chapter updated successfully.');
    }


    public function destroy($id)
    {
        Chapter::destroy($id);
        return redirect()->back()->with('success', 'Chapter deleted successfully.');
    }
}
