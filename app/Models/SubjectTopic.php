<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectTopic extends Model
{

    protected $table = 'subject_child';
    protected $primaryKey = 'subject_child_id';
    protected $fillable = [
    'subject_id',
    'subject_topic_name',
    'subject_status',
    'topic_pdf',
];

    /**
     * Get the subject that owns the topic.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * Get the lessons for the topic.
     */
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
