<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyllabusList extends Model
{
    protected $table = 'syllabus_list';
    protected $primaryKey = 'syllabusTopic_id';
    protected $fillable = ['syllabusTopic_name','syllabusTopic_pdf', 'syllabusTopic_status','syallabus_id'];
}
