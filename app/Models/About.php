<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    protected $fillable = ['titre', 'description', 'image' , 'image_big'];
    use HasFactory;
}
