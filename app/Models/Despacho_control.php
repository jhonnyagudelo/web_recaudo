<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Models;

class Despacho_control extends Model {
    protected $table = 'despacho_controles';
    protected $primaryKey = 'id_despacho_control';
    const CREATED_AT  = 'create_at';
    const UPDATED_AT = 'update_at'; 
}