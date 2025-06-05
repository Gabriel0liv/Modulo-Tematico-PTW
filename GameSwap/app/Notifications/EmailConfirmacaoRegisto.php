<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailConfirmacaoRegisto extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
            ->subject('Bem-vindo ao GameSwap!')
            ->greeting('Olá ' . $notifiable->name . '!')
            ->line('Seu e-mail foi registado com sucesso na nossa plataforma.')
            ->line('Agradecemos por se juntar ao GameSwap!')
            ->line('Agora você já pode explorar jogos e consoles disponíveis para troca ou venda.')
            ->action('Acessar o GameSwap', route('login'))
            ->salutation('Equipe GameSwap');
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
