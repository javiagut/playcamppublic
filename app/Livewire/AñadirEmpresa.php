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
    public $empresasAll;
    public $search = '';
    public $edit = false;

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
        $this->empresasAll = Empresa::where('nombre','LIKE','%'.$this->search.'%')->orderBy('nombre','ASC')->get();
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
    public function cargarEmpresa($id){
        $this->edit = true;
        $empresa = Empresa::find($id)->toArray();
        $this->empresa = [
            'code' => $empresa['code'],
            'nombre' => $empresa['nombre'],
            'email' => $empresa['email'],
            'direccion' => $empresa['direccion'],
            'provincia' => $empresa['provincia'],
            'etiquetas' => isset($empresa['etiquetas']) ? $empresa['etiquetas'] : [],
            'telefono' => isset($empresa['telefono']) ? $empresa['telefono'] : [],
            'mapa' => $empresa['mapa'],
            'tipo' => $empresa['tipo'],
            'web' => $empresa['web'],
            'booking' => $empresa['booking'],
        
        ];
        $this->empresa['telefono'] = explode(',', $this->empresa);

        $this->servicios = Servicio::where('empresa',$this->empresa['code'])->pluck('tipo')->toArray();
    }
    public function guardarEmpresa(){
        $this->validate([
            'empresa.nombre' => 'required',
            'empresa.provincia' => 'required',
            'empresa.etiquetas' => 'required',
            'empresa.email' => 'email',
        ]);
        $empresa = Empresa::where('code',$this->empresa['code'])->first();
        if($this->phones!='') $this->empresa['telefono'] = explode(',', $this->phones);
        $empresa->update($this->empresa);
        $empresa->servicios()->delete();
        foreach ($this->servicios as $servicio) {
            Servicio::create([
                'empresa' => $this->empresa['code'],
                'tipo' => $servicio,
                'visible' => true,
                'descripcion' => ''
            ]);
        }
        toastr()->success('Empresa actualizada');
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
        $this->edit = false;
    }

    public function resetForm(){
        $this->edit = false;
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
        $this->servicios = [];
        $this->files = [];
        toastr()->info('Formulario reseteado');
    }
}
