<?php
namespace App\Http\Traits;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Email;
use App\Emails\AppointmentEmail;

trait EmailTrait {
    public function addEmail(Request $request, $message, $settings)
    {
        if(!empty($settings->email)){
            $user = ['email' => $message->email, 'name' => $message->name];
            $message = ['date' => $message->date, 'time' => $message->time, 'guid' => str_random(25), 'message_id' => $message->id];
//            $result = (new AppointmentEmail)->withData($message)->sendTo($user);
            $result = (new AppointmentEmail)->withData($message)->sendTo($user);
            dd($result);
        }
    }
}