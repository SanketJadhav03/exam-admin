<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Http\Controllers\Controller;
use App\Models\festivalPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {

        return view('pages.festival.create');
    }
    public function index()
    {
        $festivals = Festival::whereDate('festival_date', '>=', now()->toDateString())
            ->orderBy('festival_date')
            ->paginate(10);

        return view('pages.subject.index', compact('festivals'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $exists = Festival::where('title', $request->title)->exists();

        if ($exists) {
            return redirect()->back()
                ->with('danger', 'Festival with this title already exists!')
                ->withInput(); // 👈 retains old input
        }

        $path = public_path('uploads/festivals');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Get file and generate name
        $filename = "default1080.png";
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time() . "." . $image->getClientOriginalExtension();
            $image->move($path, $filename);
        }

        $festival = Festival::create([
            'title' => $request->title,
            'image' => $filename,
            'festival_date' => $request->festival_date,
            'activation_date' => $request->activation_date,
            'status' => $request->status,
        ]);
        return redirect("/admin/festival")
            ->with('success', 'Festival Created Succefully!')
            ->with('image', $filename);
    }


    public function edit(Festival $festival, $id)
    {
        $festival = Festival::findOrFail($id);
        return view('pages.festival.edit', compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Festival $festival)
    {
        $festival = Festival::findOrFail($request->id);

        $festival->title = $request->title;
        $festival->status = $request->status;
        $festival->festival_date = $request->festival_date;
        $festival->activation_date = $request->activation_date;
        // If new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if ($festival->image) {
                $imagePath = public_path('uploads/festivals/' . $festival->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Store new image
            $image = $request->file('image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/festivals'), $imageName);
            $festival->image = $imageName;
        }
        $festival->save();

        return redirect("/admin/festival")
            ->with('warning', 'Festival Updated successfully');
    }

    public function destroy(Festival $festival, $id)
    {

        $festival = Festival::findOrFail($id);

        // Check if the Category used in any post
        $findCategory = festivalPost::where('festival_id', $id)->first();
        if ($findCategory) {
            return redirect("/admin/festival")
                ->with('danger', 'Category cannot be deleted because it is used in a post');
        }

        // Delete the image file first
        if ($festival->image && $festival->image != 'default1080.png') {
            $imagePath = public_path('uploads/festivals/' . $festival->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Then delete the record
        $festival->delete();

        return redirect("/admin/festival")
            ->with('danger', 'Festival deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $festival = Festival::findOrFail($request->id);
        $festival->status = $festival->status == 1 ? 0 : 1; // Toggle status
        $festival->save();
        if ($festival->status == 1) {
            $message = 'Festival activated successfully';
        } else {
            $message = 'Festival deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $festival->status]);
    }
}
