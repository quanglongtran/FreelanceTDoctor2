<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctor";
    protected $primaryKey = "doctor_id";
    public function doctorspeciality(){
    	return $this->hasOne('\App\DoctorSpeciality','doctor_id');
    }
    public function specialities(){
    	return $this->hasMany('\App\DoctorSpeciality','doctor_id');
    }
    public function clinics(){
    	return $this->hasMany('\App\DoctorClinic','doctor_id');
    }
    public function services(){
    	return $this->hasMany('\App\DoctorService','doctor_id');
    }
    public function activity(){
    	return $this->hasMany('\App\Answer','answer_user_id','user_id')->orderBy('created_at','DESC')->take(10);
    }
    public function questions(){
        $questionArr = array();
        $questionIds = \App\Answer::select('question_id')->where('answer_user_id', $this->user_id)->distinct()->orderBy('created_at','DESC')->limit(100)->get();

        foreach ($questionIds as $qs) {
            array_push($questionArr, $qs->question_id);
        }

        $qss = \App\Question::whereIn('question_id', $questionArr)->orderBy('created_at','DESC')->limit(5)->get();
        return $qss;
    }
}
