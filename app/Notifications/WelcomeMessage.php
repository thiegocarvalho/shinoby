<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class WelcomeMessage extends Notification
{
    use Queueable;

    private $deviceId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
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
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to($notifiable->routes['telegram'])
            // Markdown supported.
            ->content(
                "Seja Bem vindo, o seu código para ativação é:".PHP_EOL
                ."*#" . $this->deviceId."*"
            )
            ->button('Clique aqui para ativar seu dispositivo', 'https://google.com', 2, 'url');


        // (Optional) Blade template for the content.
        // ->view('notification', ['url' => $url])

        // (Optional) Inline Buttons
//            ->button('View Invoice', 'https://google.com')
//            ->button('Download Invoice', 'https://google.com')
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
