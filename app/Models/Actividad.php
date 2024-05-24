<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $connection = 'playcamp';
    protected $table = 'actividad';
    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'horario',
        'visible',
        'empresa',
        'precio',
        'lugar',
        'fecha',
        'temporada',
        'fecha_inicio',
        'fecha_fin',
        'documentos'
    ];

    protected function casts(): array
    {
        return [
            'horario' => 'array',
            'documentos' => 'array'
        ];
    }
}
