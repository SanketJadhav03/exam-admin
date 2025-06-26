<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';
    protected $primaryKey = 'chapter_id';
    protected $fillable = [
        'chapter_name',
        'status',
        'subject_id',
    ];
    
}
