<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class chat_room_connect extends Model
{
    protected $table = "chat_room_connect";
    public $timestamps = false;
    public function room(){
    	return $this->hasOne('\App\Model\chat_rooms','room_id','room_id');
    }
}
