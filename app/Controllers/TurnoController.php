<?php

namespace App\Controllers;

use App\Models\{Turno, Ruta, Vehiculo};
use Respect\Validation\Validator as v;
use Illuminate\Support\Facades\Request;

class  TurnoController extends BaseController
{

    public function getAddTurnoAction($request)
    {
        $ruta = Ruta::all();
        $vehiculos = Vehiculo::all();

        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $TurnoValidator = v::key('ruta', v::intval()->notEmpty())
                ->key('vehiculo', v::intval()->notEmtpy())
                ->key('num_turno', v::intval()->notEmtpy()->Positive()->min(1, true)->validate(1)->max(14, true)->validate(14))
                ->key('novedad', v::stringType()->notEmpty());
            try {
                $TurnoValidator->assert($postData);
                $postData = $request->getParsedBody();

                $turnos = new Turno();
                $turnos->id_ruta = $postData['ruta'];
                $turnos->vehiculo = $postData['vehiculo'];
                $turnos->numero_turno = $postData['num_turno'];
                $turnos->novedad = $postData['novedad'];
                $turnos->save();
                echo 'Guardado';
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        return $this->renderHTML('agregarTurnos.twig', [
            'rutas' => $ruta,
            'vehiculos' => $vehiculos
        ]);
    }
    /**=============================
        LISTAR TURNOS
     ===============================*/

    public function getListTurnoAction()
    {
        $turnos = Turno::all();
        return $this->renderHTML('List_turnos.twig', [
            'turnos' => $turnos
        ]);
    }
}
