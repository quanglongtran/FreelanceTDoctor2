<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorRegister extends Model
{
    protected $table = "doctor_register";
    protected $primaryKey = "id";
    public $timestamps = false;
}
