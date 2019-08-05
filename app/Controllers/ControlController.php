<?php

namespace App\Controllers;
use App\Models\Rodamiento;
use Respect\Validation\Validator as v;
use Illuminate\Support\Facades\Request;

class RodamientoController  extends BaseController {
    public function getAddRodamientoAction($request) {
			var_dump($request->getMethod());
			var_dump((string)$request->getBody());
			var_dump($request->getParsedBody());
        $responseMenssage = null;

        if($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $RodamientoValidator = v::key('planilla', v::numeric()->notEmpty()->validate();


            try{
                var_dump($RodamientoValidator->assert($postData));
                $RodamientoValidator->assert($postData);
                $postData = $request->getParsedBody();

                $rodamiento = new Rodamiento();
                $rodamiento->numero_interno = $postData['vehiculo'];
                $rodamiento->despacho_id = $postData['control'];
                $rodamiento->numero_planilla = $postData['planilla'];
                $rodamiento->save();
                $responseMenssage = 'Guardado';
            } catch(\Exception $e) {
                $responseMenssage = ($e->getMessage());
            }
        }

        return $this->renderHTML('list_road.twig',[
            'responseMessange'=> $responseMenssage
            ]);
    }
}