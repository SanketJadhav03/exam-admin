<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Syllabus;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = 0;
        $syllabuses = Syllabus::all();
         return view('pages.syllabus.index',compact('syllabuses','count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pages.syllabus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'syllabus_name' => 'required|string|max:255',
           'syllabus_status' => 'required|boolean'
        ]);

       Syllabus::create([
            'syllabus_name' => $request->syllabus_name,
            'syllabus_status' => $request->syllabus_status,
        ]);

        return redirect()->route('syllabus.index')->with('success', 'Syllabus created successfully!');
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
    {   $syllabus  = Syllabus::findorFail($id);
        return view('pages.syllabus.edit',compact('syllabus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 

        
         $request->validate([
            'syllabus_name' => 'required|string|max:255',
           'syllabus_status' => 'required|boolean'



        ]);
       $syllabus = Syllabus::findOrFail($id);
        $syllabus->update([
            'syllabus_name' => $request->syllabus_name,
            'syllabus_status' => $request->syllabus_status,
        ]);

         return redirect()->route('syllabus.index')->with('success', 'Syllabus updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $syllabus = Syllabus::findOrFail($id);
    $syllabus->delete();

    return redirect()->route('syllabus.index')->with('success', 'Syllabus deleted successfully!');
}

}
