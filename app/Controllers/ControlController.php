<?php

namespace App\Controllers;
use App\Models\Control;
use Respect\Validation\Validator as v;

class ControlController  extends BaseController {

    public function getAddControlAction($request) {
			// var_dump($request->getMethod());
			// var_dump((string)$request->getBody());
			// var_dump($request->getParsedBody());
            $respuestaMensaje = null;
        if($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $controlValidator = v::key('nombre', v::stringType()->notEmpty());


            try{
                var_dump($controlValidator->assert($postData));
                $controlValidator->assert($postData);
                $postData = $request->getParsedBody();

                $controles = new Control();
                $controles->nombre = $postData['nombre'];
                $controles->save();
                $respuestaMensaje = 'Guardado';
            } catch(\Exception $e) {
                $respuestaMensaje = $e->getMessage();
            }
        }

        return $this->renderHTML('list_road.twig',[
                'respuestaMensaje' => $respuestaMensaje
            ]);
    }



}