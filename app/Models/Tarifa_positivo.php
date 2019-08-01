<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tarifa_positivo extends Model {
    protected $table = 'tarifa_positivos';
    protected $primaryKey = 'tarifa_positivo_id';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>