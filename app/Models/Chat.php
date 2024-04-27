<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(message::class);
    }

    public function lastMessage(){
        return $this->hasOne(Message::class)->latest();
    }

    public function responser(){
        return $this->hasOne(User::class,'admin_id','id');
    }

    public function sender(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
