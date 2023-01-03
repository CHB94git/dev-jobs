<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public $vacant_id, public $name_vacant, public $user_id)
    {
    }

    // public function __construct($vacant_id, $name_vacant, $user_id)
    // {
    //     $this->vacant_id = $vacant_id;
    //     $this->name_vacant = $name_vacant;
    //     $this->user_id = $user_id;
    // }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // $url = url('/candidates/' . $this->vacant_id);
        $url = url('/notifications');

        return (new MailMessage)
            ->line('a new candidate has applied for your vacancy.')
            ->line('a vacant is: ' . $this->name_vacant)
            ->action('see notifications', $url)
            ->line('Thank you for using our application! - DevJobs');
    }

    // Almacenar las notificaciones en la DB
    public function toDatabase($notifiable)
    {
        return [
            'vacant_id' => $this->vacant_id,
            'name_vacant' => $this->name_vacant,
            'user_id' => $this->user_id,
        ];
    }
}
