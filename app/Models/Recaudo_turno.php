<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Recaudo_turno extends Model {
    protected $table = 'recaudo_turnos';
    protected $primaryKey = 'id_recaudo';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>