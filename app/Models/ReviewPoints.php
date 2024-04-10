<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewPoints extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function reviewCategory()
    {
        return $this->belongsTo(Review_cat::class,'review_cat_id','id');
    }
}
