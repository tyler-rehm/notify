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
        return 'acd7b149-6a82-46d0-9744-9749604efd1f';
    }

    /**
     * Save token to user model.
     *
     * @param  $token, $email
     * @return object
     */
    private function saveToken($token, $email)
    {
        return User::where('email', '=', $email)->update(['email_verification_token' => $token]);
    }
}