<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Models\Custom;
use App\Models\CustomPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $languages = Language::all();
        $customs = Custom::all();
        return view('pages.custom_post.create',compact('languages', 'customs'));
    }
    public function index()
    {
        $customPosts = CustomPost::join('custom', 'custom_post.custom_id', '=', 'custom.id')
            ->select('custom_post.*', 'custom.name')
            ->paginate(10);  
            // customs only
        $customs = Custom::all();

        return view('pages.custom_post.index', compact('customPosts', 'customs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
         $path = public_path('uploads/custom_post');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Get file and generate name
        $filename = "default1080.png";
        if ($request->hasFile('post_image')) {

            $image = $request->file('post_image');
            $filename = time().".".$image->getClientOriginalExtension();
            $image->move($path, $filename);
        }

        $language = CustomPost::create([
            'post_image' => $filename,
            'status' => $request->status,
            'custom_id' => $request->custom_id,
            'language_id' => $request->language_id,
            'paid' => $request->paid,
        ]);
        return redirect("/admin/custom_post")
            ->with('success', 'Custom Post Created Succefully!')
            ->with('image', $filename);
    }


    public function edit(CustomPost $custom_post, $id)
    {
        $custom_post = CustomPost::findOrFail($id);
        $languages = Language::all();
        $customs = Custom::all();
        return view('pages.custom_post.edit', compact('custom_post','languages','customs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomPost $custom_post)
    {
        $custom_post = CustomPost::findOrFail($request->id);

         
        $custom_post->status = $request->status;
        $custom_post->custom_id = $request->custom_id;
        $custom_post->language_id = $request->language_id;
        $custom_post->paid = $request->paid;
        // If new image is uploaded
        if ($request->hasFile('post_image')) {
            // Delete old image
            if ($custom_post->image) {
                $imagePath = public_path('uploads/custom_post/' . $custom_post->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Store new image
            $image = $request->file('post_image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/custom_post'), $imageName);
            $custom_post->post_image = $imageName;
        }
        $custom_post->save();

        return redirect("/admin/custom_post")
            ->with('warning', 'Custom Post Updated successfully');
    }

    public function destroy(CustomPost $language, $id)
    {

        $customPost = CustomPost::findOrFail($id);

        // Delete the image file first
        if ($customPost->image && $customPost->image != 'default1080.png') {
            $imagePath = public_path('uploads/custom_post/' . $customPost->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Then delete the record
        $customPost->delete();

        return redirect("/admin/custom_post")
            ->with('danger', 'Custom Post deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $custom_post = CustomPost::findOrFail($request->id);
        $custom_post->status = $custom_post->status == 1 ? 0 : 1; // Toggle status
        $custom_post->save();
        if ($custom_post->status == 1) {
            $message = 'Custom Post activated successfully';
        } else {
            $message = 'Custom Post deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $custom_post->status]);
    }
}
