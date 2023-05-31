<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    public function comment ()
    {
        return $this->hasMany('App\Models\Comment','chat_room_id','id');
    }
}
