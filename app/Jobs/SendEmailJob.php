<?php

namespace App\Jobs;

use App\Mail\SendMailable;
use App\Models\NewsletterSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;
    protected $subscriber;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscription)
    {
        $this->subscriber = $subscription;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() //write logic in  here
    {
        config(['mail.from.address' => 'example@example.com']);
        Mail::to($this->subscriber['email'])->send(new SendMailable($this->subscriber));
        NewsletterSubscription::updateOrCreate($this->subscriber);
    }
}
