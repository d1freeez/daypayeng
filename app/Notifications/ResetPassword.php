<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
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
        $route = route('reset_password_finish', ['token' => $notifiable->getRememberToken()]);
        return (new MailMessage)
                    ->subject('Восстановление пароля в сервисе "PayDay"')
                    ->line('Мы получили заявку на восстановление пароля от вашего аккаунта в Web2Cash. Если вам действительно нужно восстановить пароль — пройдите по ссылке:')
                    ->action($route, $route)
                    ->line('Если вы не запрашивали восстановление пароля от своего аккаунта – просто проигнорируйте это сообщение.')
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
