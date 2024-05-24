<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $connection = 'playcamp';
    protected $table = 'empresa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'nombre',
        'email',
        'direccion',
        'provincia',
        'etiquetas',
        'telefono',
        'mapa',
        'tipo',
        'web',
        'tripadvisor',
    ];
    public $timestamps = false;
    protected function casts(): array
    {
        return [
            'etiquetas' => 'array',
            'telefono' => 'array'
        ];
    }

}
