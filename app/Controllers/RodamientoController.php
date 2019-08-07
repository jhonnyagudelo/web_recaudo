<?php

namespace App\Controllers;

use App\Models\Rodamiento;
use Respect\Validation\Validator as v;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class RodamientoController extends BaseController
{
    public function getAddRodamientoAction($request)
    {
        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $RodamientoValidator = v::key('vehiculo', v::intval()->notEmpty())
                ->key('control', v::intval()->notEmpty())
                ->key('planilla', v::intval()->notEmpty());

            try {
                $RodamientoValidator->assert($postData);
                $postData = $request->getParsedBody();

                $rodamiento = new Rodamiento();
                $rodamiento->numero_planilla = $postData['planilla'];
                $rodamiento->despacho_id = $postData['control'];
                $rodamiento->numero_interno = $postData['vehiculo'];
                $rodamiento->save();
                echo 'Guardado';
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }

        return $this->renderHTML('add_road.twig');
    }


    /*=============================================
    LISTAR VEHICULOS
    =============================================*/
    public function getListRodamientoAction()
    {
        $rodamientos = Rodamiento::all();
        return $this->renderHTML('list_road.twig', [
            'rodamientos' => $rodamientos
        ]);
    }
}
