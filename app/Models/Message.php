<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{

    protected $guarded = [];
    use HasFactory;

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
