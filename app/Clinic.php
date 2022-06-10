<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = "clinic";
    protected $primaryKey = "clinic_id";
    public function specialities() {
    	return $this->hasMany('\App\ClinicSpeciality','clinic_id');
    }
    public function doctors(){
    	return $this->hasMany('\App\DoctorClinic','clinic_id');
//        return $this->belongsToMany('App\DoctorClinic', 'doctor_clinic', 'clinic_id', 'doctor_id');
    }
    public function services(){
    	return $this->hasMany('\App\ClinicService','clinic_id');
    }
    public function activity(){
    	return $this->hasMany('\App\Answer','answer_user_id','user_id')->orderBy('created_at','DESC')->take(10);
    }

    public function questions(){
        $questionArr = array();
        $questionIds = \App\Answer::select('question_id')->where('answer_user_id', $this->clinic_id)->distinct()->orderBy('created_at','DESC')->limit(100)->get();

        foreach ($questionIds as $qs) {
            array_push($questionArr, $qs->question_id);
        }

        $qss = \App\Question::whereIn('question_id', $questionArr)->orderBy('created_at','DESC')->limit(5)->get();
        return $qss;
    }
}
