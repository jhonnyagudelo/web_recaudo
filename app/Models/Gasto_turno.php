<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gasto_turno extends Model {
    protected $table = 'gasto_turnos';
    protected $primaryKey = 'gasto_id';
    const CREATED_AT = 'create_at';
    const UPDATE_AT = 'update_at';
}