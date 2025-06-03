<?php

namespace App\Livewire;

use Livewire\Component;

class App extends Component
{
    public function mount()
    {
        if (session()->has('success')) {
            $this->dispatchBrowserEvent('mostrar-notificacao', [
                'mensagem' => session('success'),
                'tipo' => 'success'
            ]);
        }

        if (session()->has('error')) {
            $this->dispatchBrowserEvent('mostrar-notificacao', [
                'mensagem' => session('error'),
                'tipo' => 'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.app');
    }
}
