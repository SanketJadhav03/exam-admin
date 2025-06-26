<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterApiController extends Controller
{
    public function getChaptersBySubject($subject_id)
    {
        $chapters = Chapter::where('subject_id', $subject_id)->where('status', 'active')
            ->orderBy('chapter_id', 'asc')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Chapters fetched successfully',
            'data' => $chapters
        ]);
    }
}
