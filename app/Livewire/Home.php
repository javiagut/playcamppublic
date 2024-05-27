<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use Illuminate\Database\Query\Builder;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\ServicioTipo;

class Home extends Component
{
    use WithPagination;

    public $campings;
    public $search='';
    public $province = [];
    public $perPage = 10;
    public $servicioTipo;

    public function paginationView()
    {
        $this->servicioTipo = ServicioTipo::get();
        $this->servicioTipo = ServicioTipo::get()->mapWithKeys(function ($item) {
            $id = $item['id'];
            unset($item['id']);
            return [$id => $item];
        })->toArray();
        return 'vendor.livewire.home';
    }

    public function render()
    {
        return view('livewire.home',
            [
                'montanas' => Empresa::select('code','nombre','provincia','etiquetas','web','tripadvisor','provincia')->whereJsonContains('etiquetas', 'montana')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPage, pageName: 'montana'),
                'playas' => Empresa::select('code','nombre','provincia','etiquetas','web','tripadvisor','provincia')->whereJsonContains('etiquetas', 'playa')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPage, pageName: 'playa'),
                'relaxs' => Empresa::select('code','nombre','provincia','etiquetas','web','tripadvisor','provincia')->whereJsonContains('etiquetas', 'relax')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPage, pageName: 'relax'),
                'deportes' => Empresa::select('code','nombre','provincia','etiquetas','web','tripadvisor','provincia')->whereJsonContains('etiquetas', 'deporte')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPage, pageName: 'deporte'),
                'fiestas' => Empresa::select('code','nombre','provincia','etiquetas','web','tripadvisor','provincia')->whereJsonContains('etiquetas', 'fiesta')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPage, pageName: 'fiesta'),
                'familias' => Empresa::select('code','nombre','provincia','etiquetas','web','tripadvisor','provincia')->whereJsonContains('etiquetas', 'familia')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPage, pageName: 'familia'),
            ]
        );
    }

    public function setProvinceFilter($province)
    {
        if (in_array($province, $this->province)) {
            $this->province = array_diff($this->province, [$province]);
        } else {
            array_push($this->province, $province);
        }
    }
}
