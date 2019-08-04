<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Salario extends Model {
    protected $table = 'salarios';
    protected $primaryKey = 'salario_id';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}

?>