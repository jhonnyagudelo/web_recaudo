<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tiempo_adicional extends Model {
    protected $table = 'tiempo_adicional';
    protected $primaryKey = 'tiempo_max_id';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>