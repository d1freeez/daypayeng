<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyCreated extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param User $notifiable
     * @return array
     */
    public function via(User $notifiable): array
    {
        $this->locale('ru');
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param User $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(User $notifiable): MailMessage
    {
        $route = $notifiable->is_active ? 'set-password' : 'verify-finish';
        return (new MailMessage())
            ->subject('Подтвердите аккаунт в сервисе "DayPay"')
            ->line(
                'В сервисе DayPay для вас создали компанию и связали эту почту.'
            )
            ->line(
                'Необходимо подтвердить аккаунт в сервисе DayPay по ссылке внизу.'
            )
            ->action(
                'Подтвердить',
                route($route, ['token' => $notifiable->email_token])
            )
            ->line('Благодарим вас за использование нашего сервиса!');
    }
}
