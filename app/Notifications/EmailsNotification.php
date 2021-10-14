<?php

namespace App\Notifications;

use App\Exceptions\Handler;
use App\Models\Bolos;
use App\Models\Emails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailsNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $emails;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Emails $emails)
    {
        $this->emails = $emails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        try {

            $bolos = Bolos::find($this->emails->bolo_id);
            $message =  (new MailMessage)->view(
                'emails.mail', ['emails' => $this->emails, 'bolos' => $bolos]
            );
            // $message =  (new MailMessage)
            //     ->line("Olá, " . $this->emails->nome . ".")
            //     ->line("O bolo $bolos->nome está disponível.");
            $this->emails->delete();
            return $message;
        } catch (Handler $ex) {
            dd($ex);
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
