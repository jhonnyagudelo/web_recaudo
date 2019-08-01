<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuarios';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}

