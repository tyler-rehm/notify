<?php
namespace App\Http\Traits;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Email;

trait EmailTrait {
    public function addEmail(Request $request, $message, $settings)
    {
        Mail::send('emails.messages.reminder', ['user' => $request], function ($m) use ($request) {
            $m->from('support@notiifii.com', 'Notiifii Support Team');

            $m->to($request->get('email'), $request->get('name'))->subject('Your Reminder!');
        });
    }
}