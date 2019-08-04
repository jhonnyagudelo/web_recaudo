<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reloj extends Model {
    protected $table = 'relojes';
    protected $primaryKey = 'id_reloj';
    public $incrementing = false;
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>