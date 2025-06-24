<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Http\Controllers\Controller; 
use App\Models\BusinessPost;
use App\Models\BusinessSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BusinessPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $business_categories = BusinessCategory::all();
        $business_sub_categories = BusinessSubCategory::all();
        return view('pages.business_post.create',compact('business_categories', 'business_sub_categories'));
    }
    public function index()
    {
        $businessPosts = BusinessPost::join('business_category', 'business_post.business_category_id', '=', 'business_category.id')
            ->select('business_post.*', 'business_category.name')
            ->paginate(10);  
            // business_sub_categories only
        $business_categories = BusinessCategory::all();
        $business_sub_categories = BusinessSubCategory::all();

        return view('pages.business_post.index', compact('businessPosts', 'business_sub_categories','business_categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
         $path = public_path('uploads/business_post');
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

        $business_category = BusinessPost::create([
            'post_image' => $filename,
            'status' => $request->status,
            'business_category_id' => $request->business_category_id,
            'business_sub_category_id' => $request->business_sub_category_id,
            'paid' => $request->paid,
        ]);
        return redirect("/admin/business_post")
            ->with('success', 'Business Post Created Succefully!')
            ->with('image', $filename);
    }


    public function edit(BusinessPost $business_post, $id)
    {
        $business_post = BusinessPost::findOrFail($id);
        $business_categories = BusinessCategory::all();
        $business_sub_categories = BusinessSubCategory::all();
        return view('pages.business_post.edit', compact('business_post','business_categories','business_sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessPost $business_post)
    {
        $business_post = BusinessPost::findOrFail($request->id);

         
        $business_post->status = $request->status;
        $business_post->business_category_id = $request->business_category_id;
        $business_post->business_sub_category_id = $request->business_sub_category_id;
        $business_post->paid = $request->paid;
        // If new image is uploaded
        if ($request->hasFile('post_image')) {
            // Delete old image
            if ($business_post->image) {
                $imagePath = public_path('uploads/business_post/' . $business_post->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Store new image
            $image = $request->file('post_image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/business_post'), $imageName);
            $business_post->post_image = $imageName;
        }
        $business_post->save();

        return redirect("/admin/business_post")
            ->with('warning', 'Business Post Updated successfully');
    }

    public function destroy(BusinessPost $businessPost, $id)
    {

        $categoryPost = BusinessPost::findOrFail($id);

        // Delete the image file first
        if ($categoryPost->image && $categoryPost->image != 'default1080.png') {
            $imagePath = public_path('uploads/business_post/' . $categoryPost->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Then delete the record
        $categoryPost->delete();

        return redirect("/admin/business_post")
            ->with('danger', 'Business Post deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $business_post = BusinessPost::findOrFail($request->id);
        $business_post->status = $business_post->status == 1 ? 0 : 1; // Toggle status
        $business_post->save();
        if ($business_post->status == 1) {
            $message = 'Business Post activated successfully';
        } else {
            $message = 'Business Post deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $business_post->status]);
    }
}
