<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class chat_rooms extends Model
{
    protected $table = "chat_rooms";
    // public $timestamps = false;
    public function connects(){
    	return $this->hasMany('\App\Model\chat_room_connect','id');
    }
    public function members(){
        $room_id = $this->id;
        $qss = \App\Users::whereIn('user_id', function($query) use ($room_id){
                        $query->select('user_id')
                        ->from(with(new chat_room_connect)->getTable())
                        ->where('room_id', $room_id);
                    })->select('user_id','fullname', 'user_type_id', 'present', 'user_type_id')->orderBy('created_at','DESC')->get();
        // $qss->getCollection()->transform(function ($value) {
        //     // $value->fullname .= '()';
        //     return $value;
        // });
        if($qss != null){
            $result = array();
            foreach($qss as $item){
                if(
                    $item->present != null && $item->present != ''
                    && $item->user_type_id != null && $item->user_type_id != '' && $item->user_type_id == 1
                ){
                    $item->fullname .= '('.$item->present.')';
                }
                $result[] = $item;
            }
            return $result;
        }
        return $qss; 
    }
    public function latest_messages(){
        $room_id = $this->id;
        $qss = \App\Model\chat_room_messages::where('room_id', $room_id)->orderBy('id','DESC')->limit(3)->get();
        return $qss;
    }
    public function members_new($room_id){
        $qss = \App\Users::whereIn('user_id', function($query) use ($room_id){
                        $query->select('user_id')
                        ->from(with(new chat_room_connect)->getTable())
                        ->where('room_id', $room_id);
                    })->select('user_id','fullname', 'user_type_id')->orderBy('created_at','DESC')->limit(50)->get();
        return $qss;
    }
    public function latest_messages_new($room_id){
        // $room_id = $this->id;
        $qss = \App\Model\chat_room_messages::where('room_id', $room_id)->orderBy('id','DESC')->limit(3)->get();
        return $qss;
    }
    public function get_info($room_id){
        // $room_id = $this->id;
        $qss = $this->find($room_id);
        return $qss;
    }
}
