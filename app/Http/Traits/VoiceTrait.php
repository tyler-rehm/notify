<?php
namespace App\Http\Traits;

use App\Voice;

use Illuminate\Http\Request;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;
use Twilio\Twiml;

trait VoiceTrait {

    public function addVoice(Request $request, $message, $settings)
    {

    }

    public function incomingResponse(Request $request)
    {
        $this->storeVoice($this->_cleanRequest($request));

        $response = new Twiml;
        $response->say("hello world!", array('voice' => 'alice'));
        print $response;
    }

    public function outgoingCall(Request $request, $message)
    {
        $this->storeVoice($this->_cleanRequest($request), $message);
        $response = new Twiml;
        $response->say("hello world!", array('voice' => 'alice'));
        print $response;
    }

    public function updateCall(Request $request)
    {
        $this->_cleanRequest($request);
    }

    private function _cleanRequest($request)
    {
        $res = array();
        foreach($request->all() as $key => $val){
            $clean_key = snake_case($key);
            $res[$clean_key] = $val;
        }
        return $res;
    }

    private function storeVoice($response, $message = null)
    {
        $voice = new Voice();

        if(!empty($message)){   // outgoing call
            $voice->message_id = $message->id;
        } else {                // incoming call
            $voice->message_id = null;
        }

        $voice->direction = $response->direction;
        $voice->to = $response->to;
        $voice->from = $response->from;
        $voice->status = $response->call_status;
        $voice->sid = $response->call_sid;
        $voice->save();
    }
}