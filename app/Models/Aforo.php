<?php

    namespace App\models;
    use Illnate\Database\Eloquent\Model;

    class Aforo extends Model {
        protected $table = 'aforos';
        protected $primaryKey = 'id_aforo';
        const CREATED_AT = 'create_at';
        const UPDATED_AT = 'update_at';
    }

?>