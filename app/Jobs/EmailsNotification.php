<?php

namespace App\Jobs;

use App\Exceptions\Handler;
use App\Models\Emails;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\EmailsNotification as NotEmailsNotification;
use Illuminate\Support\Facades\Notification;

class EmailsNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    private $emails;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Emails $emails)
    {
        $this->emails = $emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = $this->emails;

        Notification::route('mail', $email['email'])
            ->notify(new NotEmailsNotification($email));
    }
}
