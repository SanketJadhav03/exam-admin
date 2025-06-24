<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class CategoryPost extends Model
{
    protected $table = 'category_post';

    protected $fillable = [
        'category_id', 
        'language_id',
        'post_image',
        'paid',  
        'status',
    ];
    public function getImageUrlAttribute()
    {
        return $this->post_image ? asset('uploads/category_post/' . $this->post_image) : null;
        // Changed path from 'storage/languages/' to 'uploads/languages/'
    }
    protected static function booted()
    {
        static::deleting(function ($category_post) {
            if ($category_post->image && $category_post->image !== 'default1080.png') {
                $imagePath = public_path('uploads/category_post/' . $category_post->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        });
    }
}
