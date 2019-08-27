<?php 

namespace App\Controllers;

use App\Models\{Rodamiento,Turno,Tiempo,Usuario,Control};

class AdminControlController extends BaseController
{
    public function getIndexControl($resquest){

        $nombreControl = null;
        $rodamientos  = Rodamiento::all();
        $controles = Control::all();
        $turnos = Turno::all();
        $tiempos = tiempo::all();
        // $postData = $resquest->getParsedBody();
        // $user=Usuario::where('username', $postData['username'])->first();
        // if($user){
        //     if($user->tipo_id){
        //         $nombreControl= $user->tipo_id;
        //     }
        // }

        return $this->renderHTML('indexControl.twig',[
            'rodamientos' => $rodamientos,
            'turnos' => $turnos,
            'tiempos' =>$tiempos,
            // 'usuarios' =>$user,
            'controles' =>$controles,
            'nombreControl' => $nombreControl
        ]);
    }

}