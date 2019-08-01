<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model {
    protected $table = 'marcas';
    protected $primaryKey = 'id_marca';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>