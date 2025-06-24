<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {

        return view('pages.language.create');
    }
    public function index()
    {
        $languages = Language::paginate(10);
        return view('pages.language.index', compact('languages'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = Language::where('title', $request->title)->exists();

        if ($exists) {
            return redirect()->back()
                ->with('danger', 'Language with this title already exists!')
                ->withInput(); // 👈 retains old input
        }

        $path = public_path('uploads/languages');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Get file and generate name
        $filename = "default1080.png";
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time().".".$image->getClientOriginalExtension();
            $image->move($path, $filename);
        }

        $language = Language::create([
            'title' => $request->title, 
            'image' => $filename,
            'status' => $request->status,
        ]);
        return redirect("/admin/language")
            ->with('success', 'Language Created Succefully!')
            ->with('image', $filename);
    }


    public function edit(Language $language, $id)
    {
        $language = Language::findOrFail($id);
        return view('pages.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $language = Language::findOrFail($request->id);

        $language->title = $request->title;
        $language->status = $request->status;

        // If new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if ($language->image) {
                $imagePath = public_path('uploads/languages/' . $language->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Store new image
            $image = $request->file('image');
            $imageName = time()."." .$image->getClientOriginalExtension();
            $image->move(public_path('uploads/languages'), $imageName);
            $language->image = $imageName;
        }
        $language->save();

        return redirect("/admin/language")
            ->with('warning', 'Language Updated successfully');
    }

    public function destroy(Language $language, $id)
    {

        $language = Language::findOrFail($id);

        // Delete the image file first
        if ($language->image && $language->image != 'default1080.png') {
            $imagePath = public_path('uploads/languages/' . $language->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Then delete the record
        $language->delete();

        return redirect("/admin/language")
            ->with('danger', 'Language deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $language = Language::findOrFail($request->id);
        $language->status = $language->status == 1 ? 0 : 1; // Toggle status
        $language->save();
        if ($language->status == 1) {
            $message = 'Language activated successfully';
        } else {
            $message = 'Language deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $language->status]);
    }
}
