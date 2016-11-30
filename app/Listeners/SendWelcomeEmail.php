<?php

namespace App\Listeners;

namespace App\Listeners;

use Laravel\Spark\Events\Auth\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Emails\WelcomeEmail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        (new WelcomeEmail)->sendTo($event->user);
    }
}
