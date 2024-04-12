<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingPoints extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['averageStar'];



    //relationship
    public function reviewCategory()
    {
        return $this->belongsTo(Review_cat::class , 'review_cat_id');
    }

    public function getAverageStarAttribute()
    {
        return $this->sum_star / $this->count_review ;
    }
}
