<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicalAchievements extends Model
{
    protected $table = "clinical_achievements";
    protected $primaryKey="clinical_achievements_id";
    public $timestamps = false;

    public function images(){
        return $this->hasMany('\App\ClinicalAchievementsImages','clinical_achievements_id');
    }
}
