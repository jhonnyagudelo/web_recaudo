<?php

namespace App\Models;
use illuminate\Database\Eloquent\Model;

class Vehiculo extends Model {
    protected $table = 'vehiculos';
    protected $primaryKey = 'vehiculo_id';
    const CREATED_AD = 'create_at';
    const UPDATED_AD = 'update_at';
}

?>