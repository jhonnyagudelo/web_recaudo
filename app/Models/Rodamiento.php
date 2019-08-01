<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rodamiento extends Model {
    protected $table = 'rodamientos';
    protected $primaryKey = 'id_rodamiento';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>