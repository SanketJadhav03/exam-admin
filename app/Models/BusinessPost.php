<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class BusinessPost extends Model
{
    protected $table = 'business_post';

    protected $fillable = [
        'business_category_id', 
        'business_sub_category_id',
        'post_image',
        'paid',  
        'status',
    ];
    public function getImageUrlAttribute()
    {
        return $this->post_image ? asset('uploads/business_post/' . $this->post_image) : null;
        // Changed path from 'storage/languages/' to 'uploads/languages/'
    }
    protected static function booted()
    {
        static::deleting(function ($business_post) {
            if ($business_post->image && $business_post->image !== 'default1080.png') {
                $imagePath = public_path('uploads/business_post/' . $business_post->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        });
    }
}
