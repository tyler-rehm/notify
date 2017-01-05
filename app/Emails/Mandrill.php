<?php

namespace App\Emails;

use Weblee\Mandrill\Mail;

abstract class Mandrill
{
    private $mandrill;

    /**
     * Via construct injection
     *
     */
    public function __construct()
    {
        $this->mandrill = new Mail(env("MANDRILL_KEY"));
    }

    public function sendTemplate($data)
    {
        $template_name = 'welcome';
        $template_content = array(
            array(
                'name' => 'Tyler Rehm',
                'content' => 'Hello world'
            )
        );
        $message = array(
            'subject' => 'Good Morning',
            'from_email' => 'support@notiifii.com',
            'from_name' => 'Notiifii Support',
            'to' => array(
                array(
                    'email' => 'tyler@hackrforce.com',
                    'name' => 'Tyler Rehm',
                    'type' => 'to'
                )
            ),
            'important' => false,
            'track_opens' => null,
            'track_clicks' => null,
            'auto_text' => null,
            'auto_html' => null,
            'inline_css' => null,
            'url_strip_qs' => null,
            'preserve_recipients' => null,
            'view_content_link' => null,
            'tracking_domain' => null,
            'signing_domain' => null,
            'return_path_domain' => null,
            'merge' => true,
            'merge_language' => 'mailchimp',
            'global_merge_vars' => array(
                array(
                    'name' => 'merge1',
                    'content' => 'merge1 content'
                )
            ),
            'merge_vars' => array(
                array(
                    'rcpt' => 'recipient.email@example.com',
                    'vars' => array(
                        array(
                            'name' => 'merge2',
                            'content' => 'merge2 content'
                        )
                    )
                )
            ),
            'tags' => array('password-resets'),
            'recipient_metadata' => array(
                array(
                    'rcpt' => 'recipient.email@example.com',
                    'values' => array('user_id' => 123456)
                )
            ),
            'attachments' => array(
                array(
                    'type' => 'text/plain',
                    'name' => 'myfile.txt',
                    'content' => 'ZXhhbXBsZSBmaWxl'
                )
            ),
            'images' => array(
                array(
                    'type' => 'image/png',
                    'name' => 'IMAGECID',
                    'content' => 'ZXhhbXBsZSBmaWxl'
                )
            )
        );

        $return = $this->mandrill->messages()->sendTemplate($template_name, $template_content, $message);
        dd($return);
    }

}