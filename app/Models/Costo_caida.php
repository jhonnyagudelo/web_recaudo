<?php

namespace App\Models;
use Illuminate\Database\Model;

class Costo_caida extends Model {
    protected $table = 'costo_caidas';
    protected $primaryKey = 'id_costo';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}


?>