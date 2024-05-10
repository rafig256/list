<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class,'blog_category_post');
    }
}
