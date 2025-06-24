<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Http\Controllers\Controller;
use App\Models\CustomPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {

        return view('pages.custom.create');
    }
    public function index()
    {
        $customs = Custom::paginate(10);
        return view('pages.custom.index', compact('customs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = Custom::where('name', $request->name)->exists();

        if ($exists) {
            return redirect()->back()
                ->with('danger', 'Custom with this name already exists!')
                ->withInput(); // 👈 retains old input
        }
        
        
        $path = public_path('uploads/customs');
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

        $custom = Custom::create([
            'name' => $request->name, 
            'icon' => $filename,
            'status' => $request->status,
        ]);
        return redirect("/admin/custom")
            ->with('success', 'Custom Created Succefully!')
            ->with('icon', $filename);
    }


    public function edit(Custom $custom, $id)
    {
        $custom = Custom::findOrFail($id);
        return view('pages.custom.edit', compact('custom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Custom $custom)
    {
        $custom = Custom::findOrFail($request->id);

        $custom->name = $request->name;
        $custom->status = $request->status;

        // If new icon is uploaded
        if ($request->hasFile('icon')) {
            // Delete old icon
            if ($custom->icon) {
                $iconPath = public_path('uploads/customs/' . $custom->icon);
                if (file_exists($iconPath)) {
                    unlink($iconPath);
                }
            }

            // Store new icon
            $icon = $request->file('icon');
            $iconName = time()."." .$icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/customs'), $iconName);
            $custom->icon = $iconName;
        }
        $custom->save();

        return redirect("/admin/custom")
            ->with('warning', 'Custom Updated successfully');
    }

    public function destroy(Custom $custom, $id)
    {

        $custom = Custom::findOrFail($id);
        // Check if the Custom used in any post
        $findCustom = CustomPost::where('custom_id', $id)->first();
        if ($findCustom) {
            return redirect("/admin/custom")
                ->with('danger', 'Custom cannot be deleted because it is used in a post');
        }

        // Delete the icon file first
        if ($custom->icon && $custom->icon != 'default1080.png') {
            $iconPath = public_path('uploads/customs/' . $custom->icon);
            if (file_exists($iconPath)) {
                unlink($iconPath);
            }
        }

        // Then delete the record
        $custom->delete();

        return redirect("/admin/custom")
            ->with('danger', 'Custom deleted successfully');
    }
    public function updateStatus(Request $request)
    {
        $custom = Custom::findOrFail($request->id);
        $custom->status = $custom->status == 1 ? 0 : 1; // Toggle status
        $custom->save();
        if ($custom->status == 1) {
            $message = 'Custom activated successfully';
        } else {
            $message = 'Custom deactivated successfully';
        }
        // Return a success message
        return response()->json(['success' => true, 'message' => $message, 'status' => $custom->status]);
    }
}
