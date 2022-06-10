<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table = "recruitment";

    protected $primaryKey = "recruitment_id";

    public function clinic()
    {
        return $this->hasOne('App\Clinic', 'clinic_id');
    }

    public function getUrl(): string
    {
        return '/tuyendung/' . $this->url . '-' . $this->recruitment_id;
    }
}
