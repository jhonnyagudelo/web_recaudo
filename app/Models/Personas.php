<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model {
    protected $table = 'personas';
    protected $primaryKey = 'numero_documento';
    public $incrementing = false;
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>