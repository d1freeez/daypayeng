<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DashboardActivationHasChanged extends Notification
{
    use Queueable;

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
                    ->subject('Активность вашего аккаунта был изменен.')
                    ->lineIf($notifiable->is_active, 'Поздравляем! Ваш аккаунт активирован вы можете войти в свой аккаунт в системе "Web2Cash".')
                    ->lineIf(!$notifiable->is_active, 'Извиняемся! К сожалению ваш аккаунт стал не активным. Вы можете обратиться нам ответив на сообщение.')
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
