<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailCompraEfetuadaComprador extends Notification
{
    protected $produtos;

    public function __construct($produtos)
    {
        $this->produtos = $produtos;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject('Confirmação de Compra')
            ->greeting('Olá ' . $notifiable->name . '!')
            ->line('Obrigado pela sua compra! Aqui estão os produtos adquiridos:');

        foreach ($this->produtos as $produto) {
            $mail->line('- ' . $produto->nome);
        }

        return $mail->salutation('Atenciosamente, Plataforma de Jogos');
    }
}
