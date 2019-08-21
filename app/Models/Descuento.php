<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model {
    protected $table = 'descuentos';
    protected $primaryKey = 'descuento_id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}

?>