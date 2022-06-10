<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentSchedule extends Model
{
    protected $table = "appointment_schedule";
    protected $primaryKey="id";
    public $timestamps = false;
}
