<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Make sure to import your User model

class ProfileController extends Controller
{
    public function updateRegister(Request $request)
    {
        $userData = Auth::user();
        $user = User::find($userData->id);
 
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'current_password' => [
                'nullable',
                'required_with:password',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The current password is incorrect.');
                    }
                }
            ],
            'password' => 'nullable|min:8|confirmed|different:current_password',
        ], [
            'password.different' => 'New password must be different from current password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            
            $user->save();

            return redirect("/admin/profile")
                         ->with('success', 'Profile updated successfully!');
            
        } catch (\Exception $e) {
            return redirect()->back()
                         ->with('error', 'Error updating profile: '.$e->getMessage())
                         ->withInput();
        }
    }
}