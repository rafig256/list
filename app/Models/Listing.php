<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{

    protected $guarded = [];
    use HasFactory;

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
}
