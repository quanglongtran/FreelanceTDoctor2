<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakeAnAppointment extends Model
{
    protected $table = "make_an_appointment";
    protected $primaryKey="id";
    public $timestamps = false;
}
