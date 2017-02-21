<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Hackrforce Technologies',
        'product' => 'Notiifii',
        'street' => '1142 Mazarion Place',
        'location' => 'Trinity, Florida 34655',
        'phone' => '727-457-2232',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'tyler@notiifii.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'tyler@notiifii.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront()->teamTrialDays(7);

        Spark::freeTeamPlan()
            ->features([
                'Voice', 'SMS', 'Email'
            ]);

        Spark::teamPlan('Default', 'default')
            ->price(9.99)
            ->features([
                'Voice', 'SMS', 'Email'
            ]);
    }
}
