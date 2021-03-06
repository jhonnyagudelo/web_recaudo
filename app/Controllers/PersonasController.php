<?php

namespace App\Controllers;

use App\Models\Persona;
use Respect\Validation\Validator as v;
use Illuminate\Support\Facades\Request;


class PersonasController extends BaseController
{
    /** Funcion para ingresar y validar  los datos para la BD
     */
    public function getAddPersonasAction($request)
    {
        $respuestaMensaje = null;
        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $PersonaValidator = v::key('numero_documento', v::intVal()->notEmpty())
                ->key('nombre', v::stringType()->notEmpty())
                ->key('apellido', v::stringType()->notEmpty())
                ->key('tipo_documento', v::stringType()->notEmpty())
                ->key('direccion', v::stringType()->notEmpty())
                ->key('telefono', v::stringType())
                ->key('celular', v::stringType()->notEmpty())
                ->key('email', v::stringType())
                ->key('genero', v::stringType()->notEmpty());
            try {

                $PersonaValidator->assert($postData);
                $postData = $request->getParsedBody();
                if (Persona::where('numero_documento', $postData['numero_documento'])->exists()) {
                    echo '<p>El usuario con este documento ya existe !</p>';
                } else {
                    $persona = new Persona();
                    $persona->numero_documento = $postData['numero_documento'];
                    $persona->nombre = $postData['nombre'];
                    $persona->apellido = $postData['apellido'];
                    $persona->tipo_documento = $postData['tipo_documento'];
                    $persona->direccion = $postData['direccion'];
                    $persona->telefono = $postData['telefono'];
                    $persona->celular = $postData['celular'];
                    $persona->email = $postData['email'];
                    $persona->genero = $postData['genero'];
                    $persona->save();
                }
                $respuestaMensaje = 'Guardado';
            } catch (\Exception $e) {
                $respuestaMensaje = $e->getMessage();
            }
        }

        return $this->renderHTML('guardarPersona.twig', [
            'respuestaMensaje'=>$respuestaMensaje
        ]);
    }

    public function getListPersonAction()
    {
        $persona = Persona::all();
        return $this->renderHTML('listPErson.twig', [
            'personas' => $persona
        ]);
    }
}
