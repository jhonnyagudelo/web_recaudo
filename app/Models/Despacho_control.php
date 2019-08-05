<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Models;

class Despacho_control extends Model {
    protected $table = 'controles';
    protected $primaryKey = 'control_id';
    const CREATED_AT  = 'create_at';
    const UPDATED_AT = 'update_at'; 
}