<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailProdutoVendidoVendedor extends Notification
{
    protected $produto;
    protected $comprador;

    public function __construct($produto, $comprador)
    {
        $this->produto = $produto;
        $this->comprador = $comprador;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Seu Produto Foi Vendido!')
            ->greeting('Olá ' . $notifiable->name . '!')
            ->line('O seu produto "' . $this->produto->nome . '" foi comprado por ' . $this->comprador->name . '.')
            ->line('Entre em contato para combinar a entrega.')
            ->salutation('Atenciosamente, Plataforma de Jogos');
    }
}
