<?php

namespace App\Controllers;

use App\Models\{Rodamiento, Control, Vehiculo, Usuario};
use Respect\Validation\Validator as v;
// use Illuminate\Support\Facades\DB;

class RodamientoController extends BaseController
{
    public function getAddRodamientoAction($request)
    {
        $respuestaMensaje = null;
        $control = Control::all();
        $vehiculo = Vehiculo::all();
        $fileName=null;
        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $RodamientoValidator = v::key('vehiculo', v::intval()->notEmpty())
                ->key('control', v::intval()->notEmpty())
                ->key('planilla', v::intval()->notEmpty());
                // ->key('imagen', v::mimetype()->validate($fileName)->size('4MB')->valiadate($fileName));

            try {
                $RodamientoValidator->assert($postData);
                $postData = $request->getParsedBody();

				$files = $request->getUploadedFiles();
				$recibo = $files['imagen'];

				if ($recibo->getError() == UPLOAD_ERR_OK) {
					$fileName = $recibo->getClientFilename();
					$recibo->moveTo("uploads/$fileName");
					$ruta = "../public/uploads/$fileName";
				}

                $rodamientos = new Rodamiento();
                $rodamientos->numero_planilla = $postData['planilla'];
                $rodamientos->control_id = $postData['control'];
                $rodamientos->vehiculo_id = $postData['vehiculo'];
                $rodamientos->imagen = $ruta ?? null;
                $rodamientos->save();
                $respuestaMensaje = 'Guardado';
            } catch (\Exception $e) {
                $respuestaMensaje = $e->getMessage();
            }
        }

        return $this->renderHTML('agregarRodamiento.twig', [
            'controles' => $control,
            'vehiculos' => $vehiculo,
            'respuestaMensaje' => $respuestaMensaje
        ]);
    }


    /*=============================================
    LISTAR VEHICULOS
    =============================================*/
    public function getListRodamientoAction()
    {
        $vehiculo = Vehiculo::all();
        $rodamientos = Rodamiento::all();
        $nombrePerfil = $_SESSION['perfil'];
        $nombreUsuario = $_SESSION['nombreID'];
        return $this->renderHTML('listaRodamiento.twig', [
            'rodamientos' => $rodamientos,
            'vehiculos' => $vehiculo,
            'nombre' => $nombrePerfil,
            'usuario'=>$nombreUsuario
        ]);
    }

}


