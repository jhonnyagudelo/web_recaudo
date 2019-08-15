<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model {
    protected $table = 'turnos';
    protected $primaryKey = 'id_turno';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>