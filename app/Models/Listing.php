<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{

    protected $guarded = [];
    use HasFactory, SoftDeletes;

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class)->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function ImagesGallery(){
        return $this->hasMany(ImageGallery::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
