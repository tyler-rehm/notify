<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateMessage;
use App\Message;
use App\Setting;
use App\Http\Traits\EmailTrait;
use App\Http\Traits\SmsTrait;
use App\Http\Traits\VoiceTrait;
use Carbon\Carbon;


class MessagesController extends Controller
{
    use EmailTrait;
    use SmsTrait;
    use VoiceTrait;

    public function index(Request $request)
    {
        $team_id = $request->user()->current_team_id;
        $appointments = Message::where('team_id', $team_id)->where('archived', NULL)->get();
        return view('messages.index')->with('appointments', $appointments);
    }

    public function add(CreateMessage $request)
    {
        $message = new Message();

        $settings = Setting::where('team_id', $request->user()->current_team_id)->first();
        $message->team_id = $request->user()->current_team_id;

        foreach($message->getFillable() as $field){
            if($request->get($field) !== null){
                if($field == 'date'){
                    $message->{$field} = Carbon::createFromFormat('m/d/Y', $request->get($field))->format('Y-m-d');
                } else if($field == 'time') {
                    $message->{$field} = Carbon::createFromFormat('h:i a', $request->get($field))->format('H:i');
                } else {
                    $message->{$field} = $request->get($field);
                }
            }
        }
        $message->guid = str_random();
        $message->save();

        if($settings->sms){
            $this->addSms($request, $message, $settings);
        }

        if($settings->voice){
            $this->addVoice($request, $message, $settings);
        }

        if($settings->email){
            $this->addEmail($request, $message, $settings);
        }
    }

    public function update_sms(Request $request, $api_key)
    {
        if($api_key == env('TWILIO_AUTH')){
            $this->updateSms($request);
        }
    }

    public function update_call(Request $request, $api_key)
    {
        if($api_key == env('TWILIO_AUTH')) {
            $this->updateCall($request);
        }
    }

    public function incoming_response($api_key)
    {
        if($api_key == env('TWILIO_AUTH')) {
            $this->incomingResponse();
        }
    }

    public function incoming_sms(Request $request, $api_key)
    {
        if($api_key == env('TWILIO_AUTH')) {
            $this->incomingSms($request);
        }
    }

    public function update_status($guid, $status, $method)
    {
        $message = Message::where('guid', $guid)->first();
        dd($message);
        if(!empty($message)){
            $message->status = $status;
            $message->method = $method;
            $message->save();
            flash()->overlay('Thank you. Your response has been logged', 'Update Successful');
        } else {
            flash()->overlay('Failed saving your response. Please contact support for further assistance', 'Update Failed');
        }
        return redirect('/');
    }

}
