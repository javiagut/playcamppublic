<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;

class Tipo extends Component
{
    public $perPage = 12;
    public function render()
    {
        return view('livewire.tipo',
            [
                'empresas' => Empresa::whereJsonContains('etiquetas', request('tipo'))->paginate($this->perPage),
            ]
        );
    }
}
