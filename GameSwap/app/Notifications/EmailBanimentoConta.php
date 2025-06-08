<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailBanimentoConta extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Conta Banida')
            ->greeting('Olá ' . $notifiable->name . '!')
            ->line('Sua conta foi permanentemente banida por violar os termos da plataforma.')
            ->salutation('Atenciosamente, Plataforma de Jogos');
    }
}
