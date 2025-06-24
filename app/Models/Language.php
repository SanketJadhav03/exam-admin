<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File; // Changed from Storage to File

class Language extends Model
{
    protected $table = 'language';
    protected $fillable = [
        'title',
        'image',
        'status',
    ];

    /**
     * Get the URL for the language image
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/languages/' . $this->image) : null;
        // Changed path from 'storage/languages/' to 'uploads/languages/'
    }
 
    protected static function booted()
    {
        static::deleting(function ($language) {
            if ($language->image && $language->image !== 'default1080.png') {
                $imagePath = public_path('uploads/languages/' . $language->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        });
    }
}