<?php

namespace App\Emails;

use App\User;

class AppointmentEmail extends CampaignMonitorEmail
{
    /**
     * Get the email id.
     *
     * @return string
     */
    public function getEmailId()
    {
        return '82826da8-3e4c-4c1a-8481-78ca1ab633c9';
    }

    /**
     * Get an array of variables for the CM email.
     *
     * @param  $user
     * @return array
     */
    public function variables($user)
    {
        foreach($user as $key => $val){
            if(empty($this->data[$key])){
                $this->data[$key] = $val;
            }
        }
        return $this->data;
    }
}