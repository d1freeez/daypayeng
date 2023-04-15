<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyInvitation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return (new MailMessage)
                    ->subject('Для вас создан аккаунт в сервисе управления заработной платой "Web2Cash"')
                    ->line('Ваша компания создала для вас аккаунт в сервисе управления заработной платой "Web2Cash".')
                    ->line('Пожалуйста, придумайте пароль для вашего аккаунта по ссылке ниже.')
                    ->action('Перейти', route('set-password', ['token' => $notifiable->email_token]))
                    ->line('Благодарим вас за использование нашего сервиса!');
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
