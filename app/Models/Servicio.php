<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $connection = 'playcamp';
    protected $table = 'servicio';
    public $timestamps = false;
    protected $fillable = [
        'descripcion',
        'precio',
        'visible',
        'tipo',
        'empresa'
    ];
}
