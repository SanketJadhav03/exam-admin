<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentRegisterController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all student registrations from the database
        $studentRegistrations = Student::all();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response([
                'status' => 'true',
                'message' => 'Student registrations retrieved successfully',
                'data' => $studentRegistrations,
            ]);
        }

        return view('pages.student_registration.index', compact('studentRegistrations'));
    }


    
public function store(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'student_name'     => 'required|string|max:255',
            'student_email'    => 'required|email',
            'student_mobile'   => 'nullable|string|max:10',
            'student_password' => 'nullable|string|min:7',
            'isGoogle'         => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Check if student already exists
        $student = Student::where('student_email', $request->student_email)->first();

        if ($student) {
            // ✅ Already exists - login directly
            $token = $student->createToken('student-token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'user' => $student,
                'token' => $token
            ], 200);
        }

        // ✅ Else create new student


        $student = Student::create([
            'student_name'     => $request->student_name,
            'student_email'    => $request->student_email,
            'student_mobile'   => $request->student_mobile ?? $request->mobile,
            'student_password' => $request->isGoogle ? null : Hash::make($request->student_password),
             'student_image'    => $request->student_image ?? null,  // 🔥 Save image
            'isGoogle'         => $request->isGoogle,
        ]);

        // ✅ Generate token
        $token = $student->createToken('student-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => $request->isGoogle ? 'Google signup successful' : 'User registered successfully',
            'user' => $student,
            'token' => $token
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Internal Server Error',
            'error' => $e->getMessage()
        ], 500);
    }
}

  
}
