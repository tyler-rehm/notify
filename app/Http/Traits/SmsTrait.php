<?php
namespace App\Http\Traits;

use App\Sms;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

trait SmsTrait {

    private $client;

    function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
    }

    public function addSms(Request $request, $message, $settings)
    {
        $sms = new Sms();

        foreach($sms->getFillable() as $field){
            if(!empty($request->get($field))){
                $data[$field] = $request->get($field);
            }
        }

        $data['message'] = $this->getBody($message);

        if(empty($data['message'])){
            $data['message'] = 'You forgot to enter a message, please try again.';
        }

        if(!empty($message->phone_number)){
                $sms->message_id = $message->id;
                $sms->direction = 'outbound';
                $sms->to = $message->phone_number;
                $sms->from = env('TWILIO_DEFAULT_NUMBER');
                $sms->message = $data['message'];
                $sms->status = null;
                $sms->sid = null;
                $sms->save();

                $message = 'Successfully added SMS.';
        } else {
            $message = 'Phone number missing. Please try again.';
        }
        $this->send();
        return $message;
    }

    public function send()
    {
        $sms = Sms::where('status', null)->with('parent', 'parent.type', 'parent.team', 'parent.team.sms_schedule', 'parent.team.setting')->get();

        foreach($sms as $s){
            $day_of_week = strtolower(Carbon::now($s->parent->team->setting->timezone_offset)->format('l'));
            $locale = Carbon::now($s->parent->team->setting->timezone_offset)->format('Hm');
            $start = $s->parent->team->sms_schedule[0]->{$day_of_week . '_start'};
            $stop = $s->parent->team->sms_schedule[0]->{$day_of_week . '_stop'};

            if(($s->parent->team->sms_schedule[0]->{$day_of_week}) &&
                ($locale >= $start && $locale <= $stop) && $this->_typeRestrictions($s)){
                $this->_fire($s);
            }
        }
    }

    private function _typeRestrictions($sms)
    {
        $res = false;
        switch($sms->parent->type->name){
            case 'Appointment':
                $res = $this->_appointmentCheck($sms);
                break;
            case 'Broadcast':
            default:
                $res = $this->_broadcastCheck($sms);
            break;
        }
        return $res;
    }

    private function _appointmentCheck($sms)
    {
        $day_of_week = strtolower(Carbon::now($sms->parent->team->setting->timezone_offset)->format('l'));

        if(!empty($sms->parent->date)){
            // check if within lead time
            // check if appointment has not occurred
            $lead_time = $sms->parent->team->sms_schedule[0]->{$day_of_week . '_lead_time'};
            $today = Carbon::now($sms->parent->team->setting->timezone_offset)->format('Y-m-d');
            $start_date = Carbon::createFromFormat('Y-m-d', $sms->parent->date)->subDays($lead_time)->format('Y-m-d');

            if(($today >= $start_date) && ($today < $sms->parent->date)){
                return true;
            } else {
                return false;
            }
        }
    }

    private function _broadcastCheck($sms)
    {
        return true;
    }

    private function _fire($sms)
    {
        try{
            $response = $this->client->messages->create(
                $sms->to,
                array(
                    'from' => $sms->from,
                    'body' => $sms->message,
                    'StatusCallback' => url('/') . '/sms/update/' . env('TWILIO_AUTH')
                )
            );

            $s = Sms::find($sms->id);
            $s->status = $response->status;
            $s->{$response->status} = date('Y-m-d H:i:s');
            $s->sid = $response->sid;
            $s->save();

        } catch (TwilioException $exception){
            $message  = 'Twilio Exception: ' . $exception;
        }
    }

    public function updateSms(Request $request)
    {
        $sms = Sms::where('sid', $request->MessageSid)->update(['status' => $request->SmsStatus, $request->SmsStatus => date('Y-m-d H:i:s')]);
    }

    private function getBody($message)
    {
        dd($message);
        if(empty($message->message)){
            $template = $this->getTemplate($message->current_team_id);
        } else {
            $template = $message->message;
        }

        preg_match_all('/{(.*?)}/', $template, $matches);
        $replaces = $matches[1];

        foreach($replaces as $replace) {
            if(!empty($message->{$replace})){
                if($replace == 'date'){
                    $new = Carbon::createFromFormat('Y-m-d', $message->{$replace})->format('D M d');
                } else if($replace == 'time'){
                    $new = Carbon::createFromFormat('H:i', $message->{$replace})->format('h:i A');
                } else {
                    $new = $message->{$replace};
                }
                $template = str_replace('{' . $replace . '}', $new, $template);
            }
        }

        return $template;
    }

    private function getTemplate($team_id)
    {
        $default = 'This is the default message. Variable #1: {name}. {test}';
        return $default;
    }

    public function incomingSms(Request $request)
    {
        $to = str_replace('+1', '', $request->To);
        $from = str_replace('+1', '', $request->From);
        $message = $request->Body;

        $message = Sms::where('to', $from)->with('parent.team.setting')->orderBy('delivered','DESC')->first();

        $sms = new Sms();
        $sms->message_id = null;
        $sms->direction = 'inbound';
        $sms->to = $to;
        $sms->from = $from;
        $sms->message = $request->Body;
        $sms->status = $request->SmsStatus;
        $sms->sid = $request->MessageSid;
        $sms->{$request->SmsStatus} = date('Y-m-d H:i:s');
        $sms->save();

        $status = $this->_confirmationStatus($sms->message);
        $this->_updateAppointmentStatus($message, $status);
        $this->_sendConfirmation($message);
    }

    private function _sendConfirmation($sms)
    {
        if(!empty($sms->parent->team->setting->sms_confirmation)){
            $message = Message::where('id', $sms->parent->id)->first();
            $default = 'Thank you for {status} your appointment. {directions}.';
            $contact_number = formatPhone($sms->parent->team->setting->contact_phone);

            switch($message->status){
                case 'Confirmed':
                    $variables['status'] = 'confirming';
                    $variables['directions'] = 'We look forward to seeing you soon';
                    break;
                case 'Cancelled':
                    $variables['status'] = 'cancelling';
                    $variables['directions'] = 'Please call our office at ' . $contact_number . ' to reschedule';
                    break;
                case 'Rescheduled':
                    $variables['status'] = 'rescheduling';
                    $variables['directions'] = 'Please call our office at ' . $contact_number;
                    break;
                default:
                    break;
            }

            $body = $default;

            preg_match_all('/{(.*?)}/', $default, $matches);
            $replaces = $matches[1];

            foreach($replaces as $replace) {
                if(!empty($variables[$replace])){
                    $body = str_replace('{' . $replace . '}', $variables[$replace], $body);
                }
            }

            $sms->message_id = $message->id;
            $sms->direction = 'outbound';
            $sms->to = $message->phone_number;
            $sms->from = env('TWILIO_DEFAULT_NUMBER');
            $sms->message = $body;
            $sms->status = null;
            $sms->sid = null;
            $sms->save();

            $this->send();
        }
    }

    private function _updateAppointmentStatus($sms, $status)
    {
        $message = Message::find($sms->message_id);
        $message->status = $status;
        $message->save();
    }

    private function _confirmationStatus($message)
    {
        switch(true){
            case stripos($message,'yes') !== false:
            case stripos($message,'confirm') !== false:
            case stripos($message,'confirmed') !== false:
                $status = 'Confirmed';
                break;
            case stripos($message,'no') !== false:
            case stripos($message,'cancelled') !== false:
                $status = 'Cancelled';
                break;
            case stripos($message,'reschedule') !== false:
            case stripos($message,'rescheduled') !== false:
                $status = 'Rescheduled';
                break;
            default:
                $status = 'Unknown';
                break;
        }

        return $status;
    }
}