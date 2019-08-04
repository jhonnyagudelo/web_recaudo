<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caida_consecutiva extends Model {
    protected $table = 'caida_consecutivas';
    protected $primaryKey = 'caida_consecutiva_id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
