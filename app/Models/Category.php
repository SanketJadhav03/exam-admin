<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name',
        'icon',
        'status',
    ]; 
    public function getImageUrlAttribute()
    {
        return $this->icon ? asset('uploads/languages/' . $this->icon) : null;
        // Changed path from 'storage/languages/' to 'uploads/languages/'
    }
 
    protected static function booted()
    {
        static::deleting(function ($categories) {
            if ($categories->icon && $categories->icon !== 'default1080.png') {
                $iconPath = public_path('uploads/categories/' . $categories->icon);
                if (File::exists($iconPath)) {
                    File::delete($iconPath);
                }
            }
        });
    }
}
