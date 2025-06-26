<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{   
    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';
    protected $fillable = ['subject_name', 'subject_image'];

    public function subjectTopics()
    {
        return $this->hasMany(SubjectTopic::class, 'subject_id');
    }
}
