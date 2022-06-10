<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $table = "notify";
    protected $primaryKey="notify_id";
    public $timestamps = false;
}
