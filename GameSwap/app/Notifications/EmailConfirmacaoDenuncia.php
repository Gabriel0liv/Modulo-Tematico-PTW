<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailConfirmacaoDenuncia extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Denúncia Recebida')
            ->greeting('Olá ' . $notifiable->name . '!')
            ->line('Recebemos sua denúncia. A equipe irá analisar o caso e tomar as medidas necessárias.')
            ->salutation('Atenciosamente, Plataforma de Jogos');
    }
}
