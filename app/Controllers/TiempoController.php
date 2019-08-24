<?php

namespace App\Controllers;

use App\Models\Tiempo;
use Respect\Validation\Validator as v;


class TiempoController extends BaseController 
{
    public function getTiemposAction($request)
    {
        if($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $TiempoValidator = v::key('observacion', v::stringType());

            try {
                $TiempoValidator->assert($postData);
                $postData = $request->getParsedBody();

                $tiempos = new Tiempo();
                $tiempos->tiempo_marcada = $postData['tiempo_marcada'];
                $tiempos->observacion = $postData['observacion'];
                $tiempos->save();
                echo 'Guardado';
            } catch (\Exeption $e) {
                echo $e->getMessage();
            }
        }
        return $this->renderHTML('time_cost_cali.twig',[

        ]);
    }
    public function getListTiempoAction()
    {
        // $tiempos = Tiempo::find('id_tiempo');
        // var_dump($tiempos->nombre_marcada);
        $tiempos = Tiempo::all();
        return $this->renderHTML('time_cost_cali.twig',[
            'tiempos' => $tiempos
        ]);
    }
}