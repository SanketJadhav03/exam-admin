<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Questions_Bookmark;
use Illuminate\Http\Request;

class BookmarkApiController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'chapter_question_id' => 'required',
            'chapter_id' => 'required',
            'subject_id' => 'required',
            // 'user_id' => 'required|exists:users,id',
            'bookmark' => 'required',
        ]);

        $bookmark = Questions_Bookmark::updateOrCreate(
            [
                'chapter_question_id' => $request->chapter_question_id,
                'user_id' => $request->user_id,
            ],
            [
                'chapter_id' => $request->chapter_id,
                'subject_id' => $request->subject_id,
                'bookmark' => $request->bookmark,
            ]
        );

        return response()->json([
            'status' => true,
            'message' => 'Bookmark saved successfully',
            'data' => $bookmark
        ]);
    }
}
