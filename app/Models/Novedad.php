<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model {
    protected $table = 'novedades';
    protected $primaryKey = 'id_novedad';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>