<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['listing_id','name','email','message'];
    use HasFactory;

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
