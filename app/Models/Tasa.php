<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tasa extends Model {
    protected $table = 'tasas';
    protected $primaryKey = 'tasa_id';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>