<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Team extends SparkTeam
{
    public function setting()
    {
        return $this->hasOne('App\Setting');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function sms_schedule()
    {
        return $this->hasMany('App\Schedule')->where('type', 'sms');
    }
}
