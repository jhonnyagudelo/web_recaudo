<?php

namespace App\Controllers;
use App\Models\Control;
use Respect\Validation\Validator as v;

class ControlController  extends BaseController {
    public function getAddControlAction($request) {
			var_dump($request->getMethod());
			var_dump((string)$request->getBody());
			var_dump($request->getParsedBody());

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
                echo 'Guardado';
            } catch(\Exception $e) {
                echo  $e->getMessage();
            }
        }

        return $this->renderHTML('list_road.twig',[
            
            ]);
    }
}