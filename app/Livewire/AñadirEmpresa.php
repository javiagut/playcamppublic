<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\ServicioTipo;
use App\Models\Servicio;
use Spatie\Image\Image;
use File;
class AñadirEmpresa extends Component
{
    use WithFileUploads;

    public $valid = false;
    public $code = '';
    public $empresa;
    public $phones;
    public $files = [];
    public $servicioTipo = [];
    public $servicios = [];

    public function __construct(){
        $this->servicioTipo = ServicioTipo::all();
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
            'booking' => '',
        ];
    }

    public function render()
    {
        return view('livewire.añadir-empresa');
    }

    public function isValid()
    {
        if (env('APP_DEBUG') || $this->code == env('passAdmin')) $this->valid = true;
    }
    public function servicio($servicio)
    {
        $index = array_search($servicio, $this->servicios);
        if (!in_array($servicio, $this->servicios)) {
            $this->servicios[] = $servicio;
        } else {
            unset($this->servicios[$index]);
            toastr()->warning('Servicio eliminado');
        }
    }
    public function etiqueta($etiqueta)
    {
        $index = array_search($etiqueta, $this->empresa['etiquetas']);
        if (!in_array($etiqueta, $this->empresa['etiquetas'])) {
            if (count($this->empresa['etiquetas'])==2) {
                toastr()->error('Solo puedes añadir dos etiquetas');
            }else{
                $this->empresa['etiquetas'][] = $etiqueta;
            }
        } else {
            unset($this->empresa['etiquetas'][$index]);
            toastr()->warning('Etiqueta eliminada');
        }
    }
    public function añadirEmpresa()
    {
        // dd($this->empresa);
        if($this->phones!='') $this->empresa['telefono'] = explode(',', $this->phones);
        $this->validate([
            'empresa.nombre' => 'required',
            'empresa.provincia' => 'required',
            'empresa.etiquetas' => 'required',
            'empresa.email' => 'email',
            'files' => 'required|array|min:5|max:5'
        ]);
        Empresa::create($this->empresa);
        for ($i=0; $i < 5 ; $i++) {
            Storage::disk('public')->put($this->empresa['code'].'/'.$i.'.webp', file_get_contents($this->files[$i]->getRealPath()));
            $path = Storage::disk('public')->path($this->empresa['code'].'/'.$i.'.webp');
            $image = Image::load($path);
            if ($image->getWidth() > 950) {
                $image->width(950);
                $image->save($path, 100, 'webp');
            }
        }
        foreach ($this->servicios as $servicio) {
            Servicio::create([
                'empresa' => $this->empresa['code'],
                'tipo' => $servicio,
                'visible' => true,
                'descripcion' => ''
            ]);
        }
        toastr()->success('Empresa añadida');
        $this->servicios=[];
        $this->files=[];
        $this->phones='';
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
            'booking' => '',
        ];
    }
}
