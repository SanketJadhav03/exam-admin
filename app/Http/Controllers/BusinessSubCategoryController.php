<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\BusinessSubCategory;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BusinessSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $business_categories = BusinessCategory::all();
        return view('pages.business_sub_category.create', compact('business_categories'));
    }
    public function index()
    {
        $business_sub_categories = BusinessSubCategory::paginate(10);
        return view('pages.business_sub_category.index', compact('business_sub_categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = BusinessSubCategory::where('name', $request->name)->exists();

        if ($exists) {
            return redirect()->back()
                ->with('danger', 'Business Sub Category with this name already exists!')
                ->withInput(); // 👈 retains old input
        }

        $path = public_path('uploads/business_sub_category');
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

        $category = BusinessSubCategory::create([
            'name' => $request->name,
            'business_category_id' => $request->business_category_id, 
            'icon' => $filename,
            'status' => $request->status,
        ]);
        return redirect("/admin/business_sub_category")
            ->with('success', 'Business Sub Category Created Succefully!')
            ->with('icon', $filename);
    }


    public function edit(BusinessSubCategory $category, $id)
    {
        $business_sub_category = BusinessSubCategory::findOrFail($id);
        $business_categories = BusinessCategory::all();
        return view('pages.business_sub_category.edit', compact('business_sub_category','business_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessSubCategory $category)
    {
        $category = BusinessSubCategory::findOrFail($request->id);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->business_category_id = $request->business_category_id;

        // If new icon is uploaded
        if ($request->hasFile('icon')) {
            // Delete old icon
            if ($category->icon) {
                $iconPath = public_path('uploads/business_categories/' . $category->icon);
                if (file_exists($iconPath)) {
                    unlink($iconPath);
                }
            }

            // Store new icon
            $icon = $request->file('icon');
            $iconName = time()."." .$icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/business_categories'), $iconName);
            $category->icon = $iconName;
        }
        $category->save();

        return redirect("/admin/business_sub_category")
            ->with('warning', 'Business Sub Category Updated successfully');
    }

    public function destroy(BusinessSubCategory $category, $id)
    {

        $category = BusinessSubCategory::findOrFail($id);
       

        // Delete the icon file first
        if ($category->icon && $category->icon != 'default1080.png') {
            $iconPath = public_path('uploads/business_sub_category/' . $category->icon);
            if (file_exists($iconPath)) {
                unlink($iconPath);
            }
        }

        // Then delete the record
        $category->delete();

        return redirect("/admin/business_sub_category")
            ->with('danger', 'Business Sub Category deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $business_sub_category = BusinessSubCategory::findOrFail($request->id);
        $business_sub_category->status = $business_sub_category->status == 1 ? 0 : 1; // Toggle status
        $business_sub_category->save();
        if ($business_sub_category->status == 1) {
            $message = 'Business Sub Category activated successfully';
        } else {
            $message = 'Business Sub Category deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $business_sub_category->status]);
    }
}
