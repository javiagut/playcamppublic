<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use Illuminate\Database\Query\Builder;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\ServicioTipo;
use ImageOptimizer;
use Illuminate\Support\Facades\Log;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class Home extends Component
{
    use WithPagination;

    public $campings;
    public $search='';
    public $province = [];
    public $perPageMontana = 10;
    public $perPagePlaya = 10;
    public $perPageRelax = 10;
    public $perPageDeporte = 10;
    public $perPageFiesta = 10;
    public $perPageFamilia = 10;
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
            [ 'categorias' => [
                'montana' => Empresa::select('code','nombre','provincia','etiquetas','web','booking','provincia','email','telefono')->whereJsonContains('etiquetas', 'montana')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPageMontana, pageName: 'montana'),
                'playa' => Empresa::select('code','nombre','provincia','etiquetas','web','booking','provincia','email','telefono')->whereJsonContains('etiquetas', 'playa')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPagePlaya, pageName: 'playa'),
                'relax' => Empresa::select('code','nombre','provincia','etiquetas','web','booking','provincia','email','telefono')->whereJsonContains('etiquetas', 'relax')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPageRelax, pageName: 'relax'),
                'deporte' => Empresa::select('code','nombre','provincia','etiquetas','web','booking','provincia','email','telefono')->whereJsonContains('etiquetas', 'deporte')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPageDeporte, pageName: 'deporte'),
                'fiesta' => Empresa::select('code','nombre','provincia','etiquetas','web','booking','provincia','email','telefono')->whereJsonContains('etiquetas', 'fiesta')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPageFiesta, pageName: 'fiesta'),
                'familia' => Empresa::select('code','nombre','provincia','etiquetas','web','booking','provincia','email','telefono')->whereJsonContains('etiquetas', 'familia')->where('nombre','ILIKE',"%$this->search%")->when(count($this->province)>0, function ($q) {
                                                                                    return $q->whereIn('provincia', $this->province);
                                                                                })->paginate($this->perPageFamilia, pageName: 'familia'),
            ]]
        );
    }
    public function loadMore($tipo)
    {
        if ($tipo == 'montana') {
            $this->perPageMontana += 10;
        } elseif ($tipo == 'playa') {
            $this->perPagePlaya += 10;
        } elseif ($tipo == 'relax') {
            $this->perPageRelax += 10;
        } elseif ($tipo == 'deporte') {
            $this->perPageDeporte += 10;
        } elseif ($tipo == 'fiesta') {
            $this->perPageFiesta += 10;
        } elseif ($tipo == 'familia') {
            $this->perPageFamilia += 10;
        }
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
