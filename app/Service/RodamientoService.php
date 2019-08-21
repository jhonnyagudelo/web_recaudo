<?php

namespace App\Service;
use App\Models\Rodamiento;
use Illuminate\Support\Facades\DB;

class RodamientoService
{
    public function addTread($despacho, $interno, $planilla)
    {
        $saveTread = DB::select('add_tread(?, ?, ?)', array($despacho, $interno, $planilla));
    }

    public function turnosVehiculos()
    {
        $queryResult =DB::select('turns(?, ?, ?, ?, ?)', array($num_vehiculo, $idruta, $num_turno, $salida, $mensaje));
    }
}




?>