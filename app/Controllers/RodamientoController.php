<?php

namespace App\Controllers;

use App\Models\{Rodamiento,Control,Vehiculo};
use Respect\Validation\Validator as v;
use Illuminate\Support\Facades\Request;
// use Illuminate\Support\Facades\DB;

class RodamientoController extends BaseController
{
    public function getAddRodamientoAction($request)
    {
        $control = Control::all();
        $vehiculo = Vehiculo::all();
        
        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $RodamientoValidator = v::key('vehiculo', v::intval()->notEmpty())
                ->key('control', v::intval()->notEmpty())
                ->key('planilla', v::intval()->notEmpty());

            try {
                $RodamientoValidator->assert($postData);
                $postData = $request->getParsedBody();

                $rodamientos = new Rodamiento();
                $rodamientos->numero_planilla = $postData['planilla'];
                $rodamientos->control_id = $postData['control'];
                $rodamientos->vehiculo_id = $postData['vehiculo'];
                $rodamientos->save();
                echo 'Guardado';
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }

        return $this->renderHTML('agregarRodamiento.twig', [
            'controles' => $control,
            'vehiculos' => $vehiculo
        ]);
    }


    /*=============================================
    LISTAR VEHICULOS
    =============================================*/
    public function getListRodamientoAction()
    {
        $vehiculo = Vehiculo::all();
        $rodamientos = Rodamiento::all();
        return $this->renderHTML('listaRodamiento.twig', [
            'rodamientos' => $rodamientos,
            'vehiculos' => $vehiculo
        ]); 
    }
}
