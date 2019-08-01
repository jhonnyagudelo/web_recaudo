<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model {
    protected $table = 'estados';
    protected $primaryKey = 'id_estado_modulo';
    public $timestamps = false;
    const CREATED_AT  = 'create_at';
    const UPDATED_AT = 'update_at'; 
}
?>