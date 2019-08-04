<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Peaje extends Model {
    protected $table = 'peajes';
    protected $primaryKey = 'id_peaje';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>