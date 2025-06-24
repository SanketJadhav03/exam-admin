<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class BusinessSubCategory extends Model
{
    protected $table = 'business_sub_category';

    protected $fillable = [
        'name',
        'icon',
        'status',
    ]; 
    public function getImageUrlAttribute()
    {
        return $this->icon ? asset('uploads/business_sub_category/' . $this->icon) : null; 
    }
 
    protected static function booted()
    {
        static::deleting(function ($business_sub_categories) {
            if ($business_sub_categories->icon && $business_sub_categories->icon !== 'default1080.png') {
                $iconPath = public_path('uploads/business_sub_category/' . $business_sub_categories->icon);
                if (File::exists($iconPath)) {
                    File::delete($iconPath);
                }
            }
        });
    }
}
