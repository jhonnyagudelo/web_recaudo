<?php

namespace App\Controllers;

use App\Models\Vehiculo;
use Respect\Validation\Validator as V;
use Illuminate\Support\Facades\Request;

class VehiculoController extends BaseController
{
    public function getAddVehiculoAction($request)
    {
        if (!empty($request->getMethod() == 'POST')) {
            $postData = $request->getParsedBody();
            $VehiculoValidation = V::key('numero', V::intVal()->notEmpty())
                ->key('placa', V::stringType()->notEmpty())
                ->key('marca', V::intVal()->notEmpty()->validate(0))
                ->key('modelo', V::intVal()->notEmpty()->validate(0))
                ->key('capacidad', V::intVal()->notEmpty()->validate(0))
                ->key('consumo', V::intVal()->notEmpty()->validate(0))
                ->key('ruta', V::stringType()->notEmpty())
                ->key('clase_bus', V::intVal()->notEmpty()->validate(0))
                ->key('carroceria', V::stringType()->notEmpty());

            try {
                $VehiculoValidation->assert($postData);
                $postData = $request->getParsedBody();

                $vehiculo = new Vehiculo();
                $vehiculo->numero_interno = $postData['numero'];
                $vehiculo->placa_vehiculo = $postData['placa'];
                $vehiculo->id_marca = $postData['marca'];
                $vehiculo->modelo = $postData['modelo'];
                $vehiculo->capacidad = $postData['capacidad'];
                $vehiculo->consumo_galon = $postData['consumo'];
                $vehiculo->ruta = $postData['ruta'];
                $vehiculo->clase_bus = $postData['clase_bus'];
                $vehiculo->carroceria = $postData['carroceria'];
                $vehiculo->save();
                echo 'Guardado';
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        return $this->renderHTML('ingreso_vehiculo.twig');
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
