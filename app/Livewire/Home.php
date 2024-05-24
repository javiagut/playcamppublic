<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;

class Home extends Component
{

    public $campings;

    public function render()
    {
        return view('livewire.home',
            [
                'montanas' => Empresa::whereJsonContains('etiquetas', 'montana')->get(),
                'playas' => Empresa::whereJsonContains('etiquetas', 'playa')->get(),
                'relaxs' => Empresa::whereJsonContains('etiquetas', 'relax')->get(),
                'deportes' => Empresa::whereJsonContains('etiquetas', 'deporte')->get(),
                'fiestas' => Empresa::whereJsonContains('etiquetas', 'fiesta')->get(),
                'familias' => Empresa::whereJsonContains('etiquetas', 'familia')->get()
            ]
        );
    }
}
