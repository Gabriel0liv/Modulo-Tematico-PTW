<?php

namespace App\Livewire;

use Livewire\Component;

class Notificacao extends Component
{
    public $mensagem;
    public $tipo;

    protected $listeners = ['mostrarNotificacao'];

    public function mostrarNotificacao($mensagem, $tipo = 'success')
    {
        $this->mensagem = $mensagem;
        $this->tipo = $tipo;

        // Oculta automaticamente após 4 segundos
        $this->dispatchBrowserEvent('ocultar-notificacao');
    }

    public function render()
    {
        return view('livewire.notificacao');
    }
}
