<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Ruta extends Model {
    protected $table = 'rutas';
    protected $primaryKey = 'id_ruta';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';


}

?>