<?php

namespace App\Emails;

use App\User;

class WelcomeEmail extends CampaignMonitorEmail
{
    /**
     * Get the email id.
     *
     * @return string
     */
    public function getEmailId()
    {
        return 'b898da66-eefc-4f99-8407-5c48b4d943bc';
    }

    /**
     * Get an array of variables for the CM email.
     *
     * @param  $user
     * @return array
     */
    public function variables($user)
    {
        $token = str_random(25);
        $this->saveToken($token, $user['email']);

        return [
            'email' => $user['email'],
            'first_name' => $user['name'],
            'domain' => url('/'),
            'email_token' => $token
        ];
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