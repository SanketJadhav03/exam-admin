<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Syllabus;
use App\Models\SyllabusList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SyllabusListController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function filterTopic(Request $request)
{
    $syllabuses = Syllabus::all();

    // Build query
    $query = SyllabusList::query();

    // Apply filter if subject_id is selected
    if ($request->filled('syallabus_id')) {
        $query->where('syallabus_id', $request->syallabus_id);
    }

    $syllabusTopics = $query->get(); // or ->paginate(12)

    return view('pages.syllabus-list.index', compact('syllabuses', 'syllabusTopics'));
}
    public function index()
    {   $syllabuses = Syllabus::all();
        $syllabusTopics = SyllabusList::all();
        
        return view('pages.syllabus-list.index', compact('syllabuses',  'syllabusTopics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $syllabuses = Syllabus::all();
        return view('pages.syllabus-list.create',compact('syllabuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
       $request->validate([
        'syallabus_id' => 'required|exists:syllabus,syallabus_id',
        'syllabusTopic_name' => 'required|string|max:255',
        'syllabusTopic_pdf' => 'required|mimes:pdf|max:10000',
        'syllabusTopic_status' => 'required|boolean',
    ]);

    $pdfPath = null;
    if ($request->hasFile('syllabusTopic_pdf')) {
        $pdfPath = $request->file('syllabusTopic_pdf')->store('syllabus_Topic', 'public');
    }
    


    SyllabusList::create([
        'syallabus_id' => $request->syallabus_id,
        'syllabusTopic_name' => $request->syllabusTopic_name,
        'syllabusTopic_pdf' => $pdfPath,
        'syllabusTopic_status' => $request->syllabusTopic_status,
    ]);

    return redirect()->route('pages.syllabus-list.index')->with('status' ,'Topic Added Successfully');
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
        $syllabusTopic = SyllabusList::findOrFail($id);
        $syllabus = Syllabus::all();
        return view('pages.syllabus-list.edit',compact('syllabusTopic','syllabus'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'syallabus_id' => 'required|exists:syllabus,syallabus_id', // Adjust table name if needed
        'syllabusTopic_name' => 'required|string|max:255',
        'syllabusTopic_status' => 'required|in:1,0',
        'syllabusTopic_pdf' => 'nullable|mimes:pdf|max:2048',
    ]);

    $topic = SyllabusList::findOrFail($id);

    $topic->syallabus_id = $request->syallabus_id;
    $topic->syllabusTopic_name = $request->syllabusTopic_name;
    $topic->syllabusTopic_status = $request->syllabusTopic_status;

    // Handle PDF file upload
    if ($request->hasFile('syllabusTopic_pdf')) {
        $pdf = $request->file('syllabusTopic_pdf');
        $pdfName = time() . '_' . $pdf->getClientOriginalName();

        // Delete old PDF if exists
        $oldPdfPath = public_path('uploads/syllabus_pdf/' . $topic->syllabusTopic_pdf);
        if (File::exists($oldPdfPath)) {
            File::delete($oldPdfPath);
        }

        // Move new PDF
        $pdf->move(public_path('uploads/syllabus_pdf'), $pdfName);
        $topic->syllabusTopic_pdf = $pdfName;
    }

    $topic->save();

    return redirect()->route('syllabus-list.index')->with('success', 'Syllabus topic updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $topic = SyllabusList::findOrFail($id);

    // Delete the associated PDF if it exists
    if ($topic->syllabusTopic_pdf) {
        $pdfPath = public_path('uploads/syllabus_pdf/' . $topic->syllabusTopic_pdf);
        if (File::exists($pdfPath)) {
            File::delete($pdfPath);
        }
    }

    // Delete the topic
    $topic->delete();

    return redirect()->route('syllabus-list.index')->with('success', 'Syllabus topic deleted successfully.');
}
}
