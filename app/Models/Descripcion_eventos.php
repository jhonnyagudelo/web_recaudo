<?php   
namespace App\Models;
use Illuminate\Database\Model;

class Descripcion_eventos extends Model {
    protected $table = 'descripcion_eventos';
    protected $primarykey = 'id_descripcion_evento';
    const CREATED_AT  = 'create_at';
    const UPDATED_AT = 'update_at';    
}

?>