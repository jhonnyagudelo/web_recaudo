<?php

namespace App\Controllers;

use App\Models\{Vehiculo,Marca};
use Respect\Validation\Validator as V;

class VehiculoController extends BaseController
{
    public function getAddVehiculoAction($request)
    {
        $respuestaMensaje = null;
        $marcas = Marca::all();
        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $VehiculoValidation = V::key('interno', V::intVal()->notEmpty()->Positive())
                ->key('placa', V::stringType()->notEmpty())
                ->key('marca', V::intVal()->notEmpty())
                ->key('modelo', V::intVal()->notEmpty()->Positive())
                ->key('capacidad', V::intVal()->notEmpty())
                ->key('consumo', V::intVal()->notEmpty())
                ->key('ruta', V::stringType()->notEmpty())
                ->key('clase_bus', V::stringType()->notEmpty())
                ->key('carroceria', V::stringType()->notEmpty());

            try {
                $VehiculoValidation->assert($postData);
                $postData = $request->getParsedBody();

                $vehiculo = new Vehiculo();
                $vehiculo->numero_interno = $postData['interno'];
                $vehiculo->placa_vehiculo = $postData['placa'];
                $vehiculo->id_marca = $postData['marca'];
                $vehiculo->modelo = $postData['modelo'];
                $vehiculo->ruta = $postData['ruta'];
                $vehiculo->capacidad = $postData['capacidad'];
                $vehiculo->consumo_galon = $postData['consumo'];
                $vehiculo->clase_bus = $postData['clase_bus'];
                $vehiculo->carroceria = $postData['carroceria'];
                $vehiculo->save();
                $respuestaMensaje = 'Guardado';
            } catch (\Exception $e) {
                $respuestaMensaje = $e->getMessage();
            }
        }
        return $this->renderHTML('ingreso_vehiculo.twig', [
            'marcas' => $marcas,
            'respuestaMensaje' => $respuestaMensaje
        ]);
    }

/*=============================================
LISTAR VEHICULOS
=============================================*/
    public function getListVehiculoAction()
    {
        $vehiculos = Vehiculo::all();

        return $this->renderHTML('list_vehicle.twig', [
            'vehiculos' => $vehiculos

        ]);
    }

}
