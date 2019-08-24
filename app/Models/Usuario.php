<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    
    public function getTipoArea()
    {
        return $this->belongsTo(Tipo_area::class, 'tipo_id');
    }
}


