<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions_Bookmark extends Model
{
    protected $table = 'questions_bookmark';
    protected $primaryKey = 'question_bookmark_id';
    protected $fillable = [
        'chapter_id',
        'user_id',
        'subject_id',
        'chapter_question_id',
        'bookmark'
    ];

    // public function chapter()
    // {
    //     return $this->belongsTo(Chapter::class, 'chapter_id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // public function subject()
    // {
    //     return $this->belongsTo(Subject::class, 'subject_id');
    // }

    // public function chapterQuestion()
    // {
    //     return $this->belongsTo(ChapterQuestion::class, 'chapter_question_id');
    // }
}
