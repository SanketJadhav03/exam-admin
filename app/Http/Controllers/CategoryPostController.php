<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $languages = Language::all();
        $categories = Category::all();
        return view('pages.category_post.create',compact('languages', 'categories'));
    }
    public function index()
    {
        $categoryPosts = CategoryPost::join('category', 'category_post.category_id', '=', 'category.id')
            ->select('category_post.*', 'category.name')
            ->paginate(10);  
            // categories only
        $categories = Category::all();

        return view('pages.category_post.index', compact('categoryPosts', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
         $path = public_path('uploads/category_post');
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

        $language = CategoryPost::create([
            'post_image' => $filename,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'language_id' => $request->language_id,
            'paid' => $request->paid,
        ]);
        return redirect("/admin/category_post")
            ->with('success', 'Category Post Created Succefully!')
            ->with('image', $filename);
    }


    public function edit(CategoryPost $category_post, $id)
    {
        $category_post = CategoryPost::findOrFail($id);
        $languages = Language::all();
        $categories = Category::all();
        return view('pages.category_post.edit', compact('category_post','languages','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryPost $category_post)
    {
        $category_post = CategoryPost::findOrFail($request->id);

         
        $category_post->status = $request->status;
        $category_post->category_id = $request->category_id;
        $category_post->language_id = $request->language_id;
        $category_post->paid = $request->paid;
        // If new image is uploaded
        if ($request->hasFile('post_image')) {
            // Delete old image
            if ($category_post->image) {
                $imagePath = public_path('uploads/category_post/' . $category_post->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Store new image
            $image = $request->file('post_image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/category_post'), $imageName);
            $category_post->post_image = $imageName;
        }
        $category_post->save();

        return redirect("/admin/category_post")
            ->with('warning', 'Category Post Updated successfully');
    }

    public function destroy(CategoryPost $language, $id)
    {

        $categoryPost = CategoryPost::findOrFail($id);

        // Delete the image file first
        if ($categoryPost->image && $categoryPost->image != 'default1080.png') {
            $imagePath = public_path('uploads/category_post/' . $categoryPost->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Then delete the record
        $categoryPost->delete();

        return redirect("/admin/category_post")
            ->with('danger', 'Category Post deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $category_post = CategoryPost::findOrFail($request->id);
        $category_post->status = $category_post->status == 1 ? 0 : 1; // Toggle status
        $category_post->save();
        if ($category_post->status == 1) {
            $message = 'Category Post activated successfully';
        } else {
            $message = 'Category Post deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $category_post->status]);
    }
}
