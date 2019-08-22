<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rodamiento extends Model {
    protected $table = 'rodamientos';
    protected $primaryKey = 'id_rodamiento';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    public function control() {
        return $this->belongsTo(Control::class, 'control_id' );
    }

    public function num_vehiculo() {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

}
