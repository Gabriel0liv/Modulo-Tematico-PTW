<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailAviso extends Notification implements ShouldQueue
{
    protected $mensagem;

    public function __construct($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Aviso de denuncia')
            ->greeting('Olá ' . $notifiable->name . '!')
            ->line($this->mensagem)
            ->salutation('Atenciosamente, Plataforma de Jogos');
    }
}
