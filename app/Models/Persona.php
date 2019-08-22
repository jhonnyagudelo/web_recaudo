<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model {
    protected $table = 'personas';
    protected $primaryKey = 'persona_id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}

?>