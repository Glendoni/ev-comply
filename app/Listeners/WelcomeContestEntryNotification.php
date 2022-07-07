<?php

namespace App\Listeners;

use App\Jobs\SendEmailJob;

class WelcomeContestEntryNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event): void
    {
        SendEmailJob::dispatch( $event->usercontent)->delay(now()->addSeconds(10));;
    }
}
