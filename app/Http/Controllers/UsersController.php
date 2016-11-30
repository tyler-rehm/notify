<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function email_verify($email, $token)
    {
        $user = User::where('email', '=', $email)->where('email_verification_token', '=', $token)->first();

        if(!empty($user)){
            $user->verified = true;
            $user->save();
            Auth::login($user);
            flash()->overlay('Your email has been successfully verified!', 'Verification Complete!');
            return redirect('/home');
        } else {
            flash()->overlay('Incorrect email token. Please try again.', 'Verification Failed!');
            return redirect('/');
        }
    }
}
