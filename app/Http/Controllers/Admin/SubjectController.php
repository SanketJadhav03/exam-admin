<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\SubjectTopic;



class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        // Fetch all subjects from the database
        $subjects = Subject::with('subjectTopics')->get();
        if($request->is('api/*')|| $request->wantsJson()) {
            return response([
                'status'=>'true',
                'message'=>'Subject Retriveing Successfully',
                'data'=>$subjects,
            ]);
        }

        return view('pages.subject.index', compact('subjects'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       
        // Validate the request data
        $request->validate([
            'subject_name' => 'required|unique:subjects,subject_name',
            'subject_image' => 'nullable|image|max:2048', // Optional image validation
        ]);

       Subject::create([
            'subject_name' => $request->subject_name,
            'subject_image' => $request->hasFile('subject_image') ? $request->file('subject_image')->store('subjects', 'public') : null,

       ]);
       return redirect()->route('subject.index')
            ->with('success', 'Subject created successfully!');

    

        // Save the subject to the databas
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
    public function edit(string $subject_id)
    {
        // Find the subject by ID
        $subject = Subject::findOrFail($subject_id);

        // Return the edit view with the subject data
        return view('pages.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product_id)
    {
        // Validate the request data
        $request->validate([
            'subject_name' => 'required|unique:subjects,subject_name,' . $product_id . ',subject_id',
            'subject_image' => 'nullable|image|max:2048', // Optional image validation
        ]);

        // Find the subject by ID
        $subject = Subject::findOrFail($product_id);

        // Update the subject data
        $subject->subject_name = $request->subject_name;
        if ($request->hasFile('subject_image')) {
            $subject->subject_image = $request->file('subject_image')->store('subjects', 'public');
        }
        $subject->save();

        return redirect()->route('subject.index')
            ->with('success', 'Subject updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $product_id)
    {
        // Find the subject by ID
        $subject = Subject::findOrFail($product_id);

        // Delete the subject
        $subject->delete();

        return redirect()->route('subject.index')
            ->with('success', 'Subject deleted successfully!');
    }
  
}
