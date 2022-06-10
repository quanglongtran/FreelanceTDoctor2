<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     protected $table = 'question';
     protected $primaryKey ="question_id";
     public function answers(){
     	return $this->hasMany('App\Answer','question_id');
     }
     public function answer(){
     	return $this->hasOne('App\Answer','question_id');
     }
     public function topic(){
     	return $this->hasOne('App\Topic');
     }
     public function speciality(){
     	return $this->hasOne('\App\Speciality','speciality_id','speciality_id');
     }

    /**
     * @return string
     */
     public function getImage(): string
     {
         return '/public/images/' . $this->question_id;
     }
    /**
     * @return string
     */
     public function getThumbnailImage(): string
     {
         return '/image/resizes/thumbnail/images/' . $this->question_id;
     }
    /**
     * @return string
     */
     public function getImageBySize($size): string
     {
         return '/image/resizes/'.$size.'/images/' . $this->question_id;
     }
}
