<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
     protected $table = 'syllabus';
    protected $primaryKey = 'syallabus_id';
    protected $fillable = ['syllabus_name', 'syllabus_status'];
}
