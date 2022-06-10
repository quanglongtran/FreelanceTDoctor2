<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class chat_room_messages extends Model
{
    protected $table = "chat_room_messages";
    public $timestamps = false;
    public function attach(){
        $message_id = $this->id;
        $qss = \App\Model\chat_room_images::where('message_id', $message_id)->first();
        return $qss;
    }
}