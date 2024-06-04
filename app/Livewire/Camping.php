<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use App\Models\ServicioTipo;

class Camping extends Component
{
    public $camping;
    public $servicioTipo;

    public function __construct() {
        $this->servicioTipo = ServicioTipo::get();
        $this->servicioTipo = ServicioTipo::get()->mapWithKeys(function ($item) {
            $id = $item['id'];
            unset($item['id']);
            return [$id => $item];
        })->toArray();
    }

    public function render()
    {
        $this->camping = Empresa::where('nombre', str_replace('-',' ', request('camping')))->first();
        return view('livewire.camping');
    }
}
