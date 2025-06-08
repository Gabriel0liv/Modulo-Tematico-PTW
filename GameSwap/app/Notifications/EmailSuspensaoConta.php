<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailSuspensaoConta extends Notification
{
    protected $reativacao;

    public function __construct($reativacao)
    {
        $this->reativacao = $reativacao;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Conta Suspensa')
            ->greeting('Olá ' . $notifiable->name . '!')
            ->line('Sua conta foi suspensa temporariamente por violar os termos de uso.')
            ->line('A conta será reativada em: ' . $this->reativacao->format('d/m/Y'))
            ->salutation('Atenciosamente, Plataforma de Jogos');
    }
}
