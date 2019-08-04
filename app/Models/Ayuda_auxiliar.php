<?php

    namespace App\models;
    use Illuminate\Database\Eloquent\Model;

    class Ayuda_auxiliar extends Model {
        protected $table = 'ayuda_auxilares';
        protected $primaryKey = 'id_ayuda';
        const CREATED_AT = 'create_at';
        const UPDATED_AT = 'update_at';
    }

?>