<?php

namespace App\Models;
use illuminate\Database\Eloquent\Model;

class Vehiculo extends Model {
    protected $table = 'vehiculos';
    protected $primaryKey = 'vehiculo_id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca');
    }
}

?>