<?php

namespace App\Emails;
use CS_REST_Transactional_SmartEmail;
use App\Email;

abstract class CampaignMonitorEmail
{
    /**
     * The CM api key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Any applicable data for the email.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Create a new WelcomeEmail instance.
     *
     * @param string|null $apiKey
     */
    public function __construct($apiKey = null)
    {
        $this->apiKey = $apiKey ?: config('services.campaign_monitor.key');
    }

    /**
     * Set the email data.
     *
     * @param  array $data
     * @return $this
     */
    public function withData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Send an transactional email.
     *
     * @param  $user
     * @return \CS_REST_Wrapper_Result
     */
    public function sendTo($user)
    {
        $params = $this->getData($user);

        $mailer = $this->newTransaction();
        $result = $mailer->send([
            'To'   => $user['email'],
            'Data' => $params
        ]);

        $response = $result->response[0];

        $email = new Email;
        $email->status = $response->Status;
        $email->external_id = $response->MessageID;
        $email->recipient = $response->Recipient;
        $email->template_id = $params['template_id'] ?: $this->getEmailId();
        $email->message_id = $params['message_id'] ?: null;
        $email->save();
    }

    /**
     * Get the data for the email.
     *
     * @param  $user
     * @return array
     */
    public function getData($user)
    {
        if (method_exists($this, 'variables')) {
            return call_user_func_array(
                [$this, 'variables'],
                array_merge(compact('user'), $this->data)
            );
        }
        $this->data['domain'] =  url('/');
        return $this->data;
    }

    /**
     * Create a new CM smart email instance.
     *
     * @return CS_REST_Transactional_SmartEmail
     */
    protected function newTransaction()
    {
        return new CS_REST_Transactional_SmartEmail(
            $this->getEmailId(), ['api_key' => $this->apiKey]
        );
    }

    /**
     * Get the email id.
     *
     * @return string
     */
    protected abstract function getEmailId();
}