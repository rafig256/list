<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function listings(){
        return $this->hasMany(Listing::class);
    }

    public function review_cats(){
        return $this->belongsToMany(Review_cat::class,'category_review_cat','category_id','review_cat_id');
    }
}
