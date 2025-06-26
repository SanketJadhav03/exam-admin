<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectApiController extends Controller
{
    public function GetAllSubject()
    {
        $subjects = Subject::orderBy('subject_id', 'asc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Subjects fetched successfully',
            'data' => $subjects
        ]);
    }
}
