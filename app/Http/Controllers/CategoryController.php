<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {

        return view('pages.category.create');
    }
    public function index()
    {
        $categories = Category::paginate(10);
        return view('pages.category.index', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = Category::where('name', $request->name)->exists();

        if ($exists) {
            return redirect()->back()
                ->with('danger', 'Category with this name already exists!')
                ->withInput(); // 👈 retains old input
        }
        $path = public_path('uploads/categories');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Get file and generate name
        $filename = "default1080.png";
        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');
            $filename = time().".".$icon->getClientOriginalExtension();
            $icon->move($path, $filename);
        }

        $category = Category::create([
            'name' => $request->name, 
            'icon' => $filename,
            'status' => $request->status,
        ]);
        return redirect("/admin/category")
            ->with('success', 'Category Created Succefully!')
            ->with('icon', $filename);
    }


    public function edit(Category $category, $id)
    {
        $category = Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::findOrFail($request->id);

        $category->name = $request->name;
        $category->status = $request->status;

        // If new icon is uploaded
        if ($request->hasFile('icon')) {
            // Delete old icon
            if ($category->icon) {
                $iconPath = public_path('uploads/categories/' . $category->icon);
                if (file_exists($iconPath)) {
                    unlink($iconPath);
                }
            }

            // Store new icon
            $icon = $request->file('icon');
            $iconName = time()."." .$icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/categories'), $iconName);
            $category->icon = $iconName;
        }
        $category->save();

        return redirect("/admin/category")
            ->with('warning', 'Category Updated successfully');
    }

    public function destroy(Category $category, $id)
    {

        $category = Category::findOrFail($id);
        // Check if the Category used in any post
        $findCategory = CategoryPost::where('category_id', $id)->first();
        if ($findCategory) {
            return redirect("/admin/category")
                ->with('danger', 'Category cannot be deleted because it is used in a post');
        }

        // Delete the icon file first
        if ($category->icon && $category->icon != 'default1080.png') {
            $iconPath = public_path('uploads/categories/' . $category->icon);
            if (file_exists($iconPath)) {
                unlink($iconPath);
            }
        }

        // Then delete the record
        $category->delete();

        return redirect("/admin/category")
            ->with('danger', 'Category deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $category->status == 1 ? 0 : 1; // Toggle status
        $category->save();
        if ($category->status == 1) {
            $message = 'Category activated successfully';
        } else {
            $message = 'Category deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $category->status]);
    }
}
