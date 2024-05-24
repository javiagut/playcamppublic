<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AñadirEmpresa extends Component
{
    use WithFileUploads;

    public $valid = true;
    public $code = '';
    public $empresa;
    public $phones;
    public $file;

    public function __construct(){

        $this->empresa = [
            'code' => Str::upper(Str::random(10)),
            'nombre' => '',
            'email' => '',
            'direccion' => '',
            'provincia' => '',
            'etiquetas' => [],
            'telefono' => [],
            'mapa' => false,
            'tipo' => 1,
            'web' => '',
            'tripadvisor' => '',
        ];
        
    }

    public function render()
    {
        return view('livewire.añadir-empresa');
    }

    public function isValid()
    {
        if ($this->code == env('passAdmin')) $this->valid = true;
    }
    public function etiqueta($etiqueta)
    {
        $index = array_search($etiqueta, $this->empresa['etiquetas']);
        if (!in_array($etiqueta, $this->empresa['etiquetas'])) {
            $this->empresa['etiquetas'][] = $etiqueta;
            toastr()->success('Etiqueta añadida');
        } else {
            unset($this->empresa['etiquetas'][$index]);
            toastr()->warning('Etiqueta eliminada');
        }
    }
    public function añadirEmpresa()
    {
        if($this->phones!='') $this->empresa['telefono'] = explode(',', $this->phones);
        $this->validate([
            'empresa.nombre' => 'required',
            'empresa.provincia' => 'required',
            'empresa.etiquetas' => 'required',
            'empresa.email' => 'email',
        ]);
        Empresa::create($this->empresa);
        // Storage::disk('avatars')->put($this->files->getClientOriginalName(), $this->files);
    }
}
