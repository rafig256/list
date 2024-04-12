<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{

    protected $guarded = [];
    protected $appends = ['averageStar'];
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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getAverageStarAttribute()
    {
        $listingPoints = ListingPoints::query()->where(['listing_id' => $this->id])->get();
        if ($listingPoints->isEmpty()){
            return 0;
        }
        foreach ($listingPoints as $listingPoint){
            $sumStar =+ $listingPoint->sum_star;
            $sumCountReview =+ $listingPoint->count_review;
        }
        $averageStar = $sumStar / $sumCountReview;
        return $averageStar;
    }
}
