<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Models\Festival;
use App\Models\FestivalPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FestivalPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $languages = Language::all();
        $festivals = Festival::all();
        return view('pages.festival_post.create', compact('languages', 'festivals'));
    }
    public function index()
    {
        $festivalPosts = FestivalPost::join('festival', 'festival_post.festival_id', '=', 'festival.id')
            ->select('festival_post.*', 'festival.title')
            ->paginate(10);
        // festivals only
        $festivals = Festival::all();

        return view('pages.festival_post.index', compact('festivalPosts', 'festivals'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = public_path('uploads/festival_post');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Get file and generate name
        $filename = "default1080.png";
        if ($request->hasFile('post_image')) {

            $image = $request->file('post_image');
            $filename = time() . "." . $image->getClientOriginalExtension();
            $image->move($path, $filename);
        }

        $language = FestivalPost::create([
            'post_image' => $filename,
            'status' => $request->status,
            'festival_id' => $request->festival_id,
            'language_id' => $request->language_id,
            'paid' => $request->paid,
        ]);
        return redirect("/admin/festival_post")
            ->with('success', 'Festival Post Created Succefully!')
            ->with('image', $filename);
    }


    public function edit(FestivalPost $festival_post, $id)
    {
        $festival_post = FestivalPost::findOrFail($id);
        $festivals =  Festival::all();
        $languages = Language::all();
        return view('pages.festival_post.edit', compact('festival_post','festivals','languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FestivalPost $festival_post)
    {
        $festival_post = FestivalPost::findOrFail($request->id);

         
        $festival_post->status = $request->status;
        $festival_post->festival_id = $request->festival_id;
        $festival_post->language_id = $request->language_id;
        $festival_post->paid = $request->paid;
        // If new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if ($festival_post->image) {
                $imagePath = public_path('uploads/festival_post/' . $festival_post->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Store new image
            $image = $request->file('image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/festival_post'), $imageName);
            $festival_post->image = $imageName;
        }
        $festival_post->save();

        return redirect("/admin/festival_post")
            ->with('warning', 'Festival Post Updated successfully');
    }

    public function destroy(FestivalPost $language, $id)
    {

        $festivalPost = FestivalPost::findOrFail($id);

        // Delete the image file first
        if ($festivalPost->image && $festivalPost->image != 'default1080.png') {
            $imagePath = public_path('uploads/festival_post/' . $festivalPost->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Then delete the record
        $festivalPost->delete();

        return redirect("/admin/festival_post")
            ->with('danger', 'Festival Post deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $festival_post = FestivalPost::findOrFail($request->id);
        $festival_post->status = $festival_post->status == 1 ? 0 : 1; // Toggle status
        $festival_post->save();
        if ($festival_post->status == 1) {
            $message = 'Festival Post activated successfully';
        } else {
            $message = 'Festival Post deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $festival_post->status]);
    }
}
