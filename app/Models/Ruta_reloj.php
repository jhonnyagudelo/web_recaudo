<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ruta_reloj extends Model {
    protected $table = 'ruta_relojes';
    protected $primaryKey = 'id_ruta_reloj';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>