<?php

namespace App\Models;

use Illuminate\Database\Model;

class Causa_novedad extends Model {
    protected $table = 'causa_novedades';
    protected $primaryKey = 'id_cauda_novedad';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
 }

