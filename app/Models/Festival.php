<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Festival extends Model
{
    protected $table = 'festival';

    protected $fillable = [
        'title',
        'image',
        'status',
        'festival_date',
        'activation_date'
    ]; 
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/festivals/' . $this->image) : null; 
    }
 
    protected static function booted()
    {
        static::deleting(function ($fetivals) {
            if ($fetivals->image && $fetivals->image !== 'default1080.png') {
                $imagePath = public_path('uploads/festivals/' . $fetivals->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        });
    }
}
