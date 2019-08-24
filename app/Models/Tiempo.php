<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tiempo extends Model {
    protected $table = 'tiempos';
    protected $primaryKey = 'id_tiempo';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';

    public function turno() {
        return $this->belongsTo(Turno::class, 'id_turno' );
    }
}

?>