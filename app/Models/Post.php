<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogCategories(){

        return $this->belongsToMany(BlogCategory::class,'blog_category_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listing (){
        return $this->belongsTo(Listing::class);
    }
}
