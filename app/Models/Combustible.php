<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    protected $table = 'combustibles';
    protected $primaryKey = 'combustible_id';
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
