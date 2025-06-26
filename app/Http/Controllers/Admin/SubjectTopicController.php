<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectTopic;
use Illuminate\Http\Request;

class SubjectTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all subject topics from the database
        $subjectTopics = SubjectTopic::with('subject')->get();
        // Eager load the subject relationship

        if (request()->is('api/*') || request()->wantsJson()) {
            return response()->json([
                'status' => 'true',
                'message' => 'Subject topics retrieved successfully',
                'data' => $subjectTopics,
            ]);
        }

        // Return the view with the subject topics
     return view('pages.subject-topic.index', compact('subjectTopics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all(); // Assuming you have a Subject model
        return view('pages.subject-topic.create' , compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.   
     */
    public function store(Request $request )
    {   // Validate the request data
        
        $request->validate([
            'subject_id' => 'required|exists:subjects,subject_id',
            'subject_topic_name' => 'required|string|max:255',
            'subject_topic_pdf' => 'nullable|mimes:pdf|max:10000',
            'subject_topic_status' => 'required|boolean', // Adjust the validation rules as needed  
        ]);

        SubjectTopic::create([
            'subject_id' => $request->subject_id,
            'subject_topic_name' => $request->subject_topic_name,
            'subject_topic_pdf' => $request->file('subject_topic_pdf') ? $request->file('subject_topic_pdf')->store('topic_pdfs', 'public') : null,
            'subject_topic_status' => $request->subject_status

        ]);
        return redirect()->route('subject-topic.index')->with('success', 'Subject topic created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjectTopic = SubjectTopic::findOrFail($id);
        $subjects = Subject::all(); // Assuming you have a Subject model
        return view('pages.subject-topic.edit', compact('subjectTopic', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
