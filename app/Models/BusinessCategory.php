<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class BusinessCategory extends Model
{
    protected $table = 'business_category';

    protected $fillable = [
        'name',
        'icon',
        'status',
    ]; 
    public function getImageUrlAttribute()
    {
        return $this->icon ? asset('uploads/business_category/' . $this->icon) : null; 
    }
 
    protected static function booted()
    {
        static::deleting(function ($business_categories) {
            if ($business_categories->icon && $business_categories->icon !== 'default1080.png') {
                $iconPath = public_path('uploads/business_category/' . $business_categories->icon);
                if (File::exists($iconPath)) {
                    File::delete($iconPath);
                }
            }
        });
    }
}
