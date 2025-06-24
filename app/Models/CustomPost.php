<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CustomPost extends Model
{
    protected $table = 'custom_post';

    protected $fillable = [
        'custom_id', 
        'language_id',
        'post_image',
        'paid',  
        'status',
    ];
    public function getImageUrlAttribute()
    {
        return $this->post_image ? asset('uploads/custom_post/' . $this->post_image) : null;
        // Changed path from 'storage/languages/' to 'uploads/languages/'
    }
    protected static function booted()
    {
        static::deleting(function ($custom_post) {
            if ($custom_post->image && $custom_post->image !== 'default1080.png') {
                $imagePath = public_path('uploads/custom_post/' . $custom_post->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        });
    }
}
