<?php 

namespace App\Controllers;

use App\Models\{Rodamiento,Turno,Tiempo,Usuario};

class AdminController extends BaseController
{
    public function getIndexControl($resquest){

        $rodamientos  = Rodamiento::all();
        $turnos = Turno::all();
        $tiempos = tiempo::all();
        $postDate = $resquest->getParsedBody();
        $user=Usuario::where('tipo_id', $postDate['tipoArea']->first());

        return $this->renderHTML('controlPrincipal.twig',[
            'rodamientos' => $rodamientos,
            'turnos' => $turnos,
            'tiempos' =>$tiempos,
            'usuarios' =>$user
        ]);
    }

}