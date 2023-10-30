<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUser extends Notification
{
    use Queueable;

    private $password;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->subject('Bem-vindo ao ' . config('app.name'))
                ->greeting('Olá ' . $notifiable->name . '!')
                ->line('Seja bem-vindo ao nosso site. Estamos empolgados por você ter se juntado à nossa comunidade.')
                ->line('Você pode fazer login com os seguintes dados: ')
                ->line('Email: ' . $notifiable->email)
                ->line('Senha: ' . $this->password)
                ->action('Acesse Agora', url('/'))
                ->line('Agradecemos por fazer parte da nossa comunidade e estamos ansiosos para ver o que você vai realizar conosco!')
                ->salutation('Atenciosamente, ' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
