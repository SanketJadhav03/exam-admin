<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\BusinessSubCategory;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {

        return view('pages.business_category.create');
    }
    public function index()
    {
        $business_categories = BusinessCategory::paginate(10);
        return view('pages.business_category.index', compact('business_categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = BusinessCategory::where('name', $request->name)->exists();

        if ($exists) {
            return redirect()->back()
                ->with('danger', 'Business Category with this name already exists!')
                ->withInput(); // 👈 retains old input
        }
        $path = public_path('uploads/business_category');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // Get file and generate name
        $filename = "default1080.png";
        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');
            $filename = time() . "." . $icon->getClientOriginalExtension();
            $icon->move($path, $filename);
        }

        $category = BusinessCategory::create([
            'name' => $request->name,
            'icon' => $filename,
            'status' => $request->status,
        ]);
        return redirect("/admin/business_category")
            ->with('success', 'Business Category Created Succefully!')
            ->with('icon', $filename);
    }


    public function edit(BusinessCategory $category, $id)
    {
        $business_category = BusinessCategory::findOrFail($id);
        return view('pages.business_category.edit', compact('business_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessCategory $category)
    {
        $category = BusinessCategory::findOrFail($request->id);

        $category->name = $request->name;
        $category->status = $request->status;

        // If new icon is uploaded
        if ($request->hasFile('icon')) {
            // Delete old icon
            if ($category->icon) {
                $iconPath = public_path('uploads/business_category/' . $category->icon);
                if (file_exists($iconPath)) {
                    unlink($iconPath);
                }
            }

            // Store new icon
            $icon = $request->file('icon');
            $iconName = time() . "." . $icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/business_category'), $iconName);
            $category->icon = $iconName;
        }
        $category->save();

        return redirect("/admin/business_category")
            ->with('warning', 'Business Category Updated successfully');
    }

    public function destroy(BusinessCategory $category, $id)
    {

        $category = BusinessCategory::findOrFail($id);
        // Check if the Category used in any post
        $findCategory = BusinessSubCategory::where('business_category_id', $id)->first();
        if ($findCategory) {
            return redirect("/admin/business_category")
                ->with('danger', 'Business Category cannot be deleted because it is used in a Sub Category');
        }

        // Delete the icon file first
        if ($category->icon && $category->icon != 'default1080.png') {
            $iconPath = public_path('uploads/business_category/' . $category->icon);
            if (file_exists($iconPath)) {
                unlink($iconPath);
            }
        }

        // Then delete the record
        $category->delete();

        return redirect("/admin/business_category")
            ->with('danger', 'Business Category deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $business_category = BusinessCategory::findOrFail($request->id);
        $business_category->status = $business_category->status == 1 ? 0 : 1; // Toggle status
        $business_category->save();
        if ($business_category->status == 1) {
            $message = 'Business Category activated successfully';
        } else {
            $message = 'Business Category deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $business_category->status]);
    }
}
