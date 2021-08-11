<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class WebHookSetMessage extends Notification
{
    use Queueable;

    private $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($return)
    {
        $this->message = $return;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toTelegram($notifiable)
    {

        $string = PHP_EOL;
        foreach ($this->message['result'] as $key => $value)
        {
            $string = $string . $key . ': '. $value . PHP_EOL;
        }
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to($notifiable->routes['telegram'])
            // Markdown supported.
            ->content($string);


        // (Optional) Blade template for the content.
        // ->view('notification', ['url' => $url])

        // (Optional) Inline Buttons
//            ->button('View Invoice', 'https://google.com')
//            ->button('Download Invoice', 'https://google.com')
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
