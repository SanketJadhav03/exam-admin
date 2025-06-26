<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterQuestion extends Model
{
    protected $table = 'chapterquestions';
    protected $primaryKey = 'chapter_question_id';
    protected $fillable = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'explanation',
        'chapter_id',
        'subject_id'
    ];
}
