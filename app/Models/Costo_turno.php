<?php

namespace App\models;
use Illuminate\Database\Model;

class Costo_turno extends Model {
    protected $table = 'costo_turnos';
    protected $primaryKey = 'id_costo';
    const CREATED_AT  = 'create_at';
    const UPDATED_AT = 'update_at';

    
}
