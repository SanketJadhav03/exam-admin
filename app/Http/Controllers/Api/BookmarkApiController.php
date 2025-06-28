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

    public function getByUser($user_id)
    {
    $bookmarks = Questions_Bookmark::where('user_id', $user_id)->get();

    if ($bookmarks->isEmpty()) {
        return response()->json([
            'status' => false,
            'message' => 'No bookmarks found for this user.',
        ], 404);
    }

    return response()->json([
        'status' => true,
        'message' => 'Bookmarks retrieved successfully.',
        'data' => $bookmarks
    ]);
    }


    public function destroy($id)
{
    $bookmark = Questions_Bookmark::find($id);

    if (!$bookmark) {
        return response()->json([
            'status' => false,
            'message' => 'Bookmark not found.'
        ], 404);
    }

    $bookmark->delete();

    return response()->json([
        'status' => true,
        'message' => 'Bookmark deleted successfully.'
    ]);
}


}
