<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review_cat extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Review_cat::class,'category_review_cat','review_cat_id','category_id');
    }
}
