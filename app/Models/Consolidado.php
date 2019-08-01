<?php

namespace App\models;

use Illuminate\Database\Model;

class Consolidado extends Model {
    protected $tale = 'consolidados';
    protected $primaryKey = 'consolidado_id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
