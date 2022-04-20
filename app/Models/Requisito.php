<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    protected $fillable =['solicitante_id', 'tipo', 'referencia', 'firma', 'observacion', 'status', 'deleteuser_id'];
    
}
