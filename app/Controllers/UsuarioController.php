<?php

namespace App\Controllers;

use App\Models\{Usuario, Tipo_area};
use Respect\Validation\Validator as v;

class UsuarioController extends BaseController
{
    public function getaddUser()
    {
        $tipo_area = Tipo_area::all();
        return $this->renderHTML('agregarUsuario.twig',[
            'tipo_areas'=>$tipo_area,
        ]);
    }

    public function postSaveUser($resquest)
    {


        if (!empty($resquest->getMethod() == 'POST')) {
            $postData = $resquest->getParsedBody();
            $UserValadation = v::key('nombre', v::stringType()->notEmpty())
                ->key('apellido', v::stringType()->notEmpty())
                ->key('username', v::stringType()->notEmpty())
                ->key('password', v::stringType()->notEmpty())
                ->key('tipoArea', v::intVal()->notEmpty());

            try {
                $UserValadation->assert($postData);
                $postData = $resquest->getParsedBody();

                $files = $resquest->getUploadedFiles();
                $imagen = $files['imagen'];

                if ($imagen->getError() == UPLOAD_ERR_OK) {
                    $fileName = $imagen->getClientFilename();
                    $imagen->moveTo("uploads/fotoUsuarios/$fileName");
                    $ruta = "../public/uploads/fotoUsuarios/$fileName";
                }

                $usuario = new Usuario();
                $usuario->nombre = $postData['nombre'];
                $usuario->apellido = $postData['apellido'];
                $usuario->imagen = $ruta ?? null;
                $usuario->username = $postData['username'];
                $usuario->password = password_hash($postData['password'], PASSWORD_DEFAULT);
                $usuario->tipo_id = $postData['tipoArea'];
                $usuario->save();
                echo 'Guardado';
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        return $this->renderHTML('agregarUsuario.twig');
    }

        // public function getMenu
}
