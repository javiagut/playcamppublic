<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use App\Models\ServicioTipo;

class Tipo extends Component
{
    public $perPage = 10;
    public $tipo;
    public $search = '';
    public $province = [];
    public $servicioTipo;
    public $categorias = ['playa','montana','relax','deporte','fiesta','familia'];

    public function __construct() {
        $this->tipo = request('tipo');
        if (!in_array($this->tipo, $this->categorias)) return $this->redirect('/');
        
        $this->servicioTipo = ServicioTipo::get();
        $this->servicioTipo = ServicioTipo::get()->mapWithKeys(function ($item) {
            $id = $item['id'];
            unset($item['id']);
            return [$id => $item];
        })->toArray();
    }

    public function paginationView()
    {
        return 'vendor.livewire.home';
    }

    public function render()
    {
        return view('livewire.tipo',
            [
                'empresas' => Empresa::select('code','nombre','provincia','etiquetas','web','booking','provincia','email','telefono','puntuacion')->whereJsonContains('etiquetas', $this->tipo)->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                    return $q->whereIn('provincia', $this->province);
                })->orderByRaw("CASE WHEN puntuacion IS NULL OR puntuacion = '' THEN 1 ELSE 0 END, puntuacion DESC")->orderBy('nombre','DESC')->paginate($this->perPage),
            ]
        );
    }
    public function loadMore($tipo)
    {
        $this->perPage += 10;
    }
    public function setProvinceFilter($province)
    {
        if (in_array($province, $this->province)) {
            $this->province = array_diff($this->province, [$province]);
        } else {
            array_push($this->province, $province);
        }
    }
    public function cleanFilters()
    {
        $this->search = '';
        $this->province = [];
    }
}
