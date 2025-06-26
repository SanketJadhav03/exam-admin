<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
     
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'student_name',
        'student_email',
        'student_password',
        'student_phone',
        'student_address',
        'student_status',
        'student_image',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the student's full name.
     */
    public function getFullNameAttribute()
    {
        return $this->attributes['student_name'];
    }   
}
