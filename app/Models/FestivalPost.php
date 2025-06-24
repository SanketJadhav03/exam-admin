<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class festivalPost extends Model
{
    protected $table = 'festival_post';

    protected $fillable = [
        'festival_id', 
        'language_id',
        'post_image',
        'paid',  
        'post_type',
        'status',
    ];
    public function getImageUrlAttribute()
    {
        return $this->post_image ? asset('uploads/festival_post/' . $this->post_image) : null;
        // Changed path from 'storage/languages/' to 'uploads/languages/'
    }
    protected static function booted()
    {
        static::deleting(function ($festival_post) {
            if ($festival_post->image && $festival_post->image !== 'default1080.png') {
                $imagePath = public_path('uploads/festival_post/' . $festival_post->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        });
    }
}
