<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioTipo extends Model
{
    use HasFactory;
    protected $connection = 'playcamp';
    protected $table = 'servicio_tipo';
}
