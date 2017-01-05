<?php

namespace App\Emails;

use App\User;

class AppointmentEmail extends Mandrill
{
    /**
     * Get the email id.
     *
     * @return string
     */
    public function getEmailId()
    {
        return 'welcome';
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