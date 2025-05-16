<?php

namespace App\Livewire;

use Livewire\Component;

class LocalizacaoSelector extends Component
{
    public $distritos = [];
    public $concelhos = [];
    public $distritoSelecionado = null;

    public function mount()
    {
        // Exemplo estático (substitui por DB depois)
        $this->distritos = [
            'Lisboa' => ['Lisboa', 'Sintra', 'Cascais'],
            'Porto' => ['Porto', 'Matosinhos', 'Gaia'],
            'Setúbal' => ['Setúbal', 'Sesimbra'],
        ];
    }

    public function updatedDistritoSelecionado($value)
    {
        $this->concelhos = $this->distritos[$value] ?? [];
    }

    public function render()
    {
        return view('livewire.localizacao-selector');
    }

}
