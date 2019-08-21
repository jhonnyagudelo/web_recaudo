<?php

namespace App\Controllers;

use App\Models\{Ruta,Peaje,Tarifa_positivo,Salario,Descuento,Combustible,Tasa,Ayuda_auxiliar};
use Respect\Validation\Validator as V;
use Illuminate\Support\Facades\Request;

class RutasController extends BaseController 
{
    public function getAddRutasAction($resques) 
    {
        $peaje = Peaje::all();
        $tarifa = Tarifa_positivo::all();
        $salario = Salario::all();
        $descuento = Descuento::all();
        $combustible = Combustible::all();
        $tasa = Tasa::all();
        $ayuda = Ayuda_auxiliar::all();

        if(!empty($resques->getMethod() == 'POST')) {
            $postData = $resques->getParsedBody();
            $RutaValidator = V::key('nombre', V::stringType()->notEmpty())
                ->key('ayudante', V::intval())
                ->key('tarifa', V::intval())
                ->key('salario', V::intval()->notEmpty())
                ->key('descuento', V::intval())
                ->key('tasa', V::intval())
                ->key('kilometros', V::intval()->notEmpty())
                ->key('combustible', V::intval()->notEmpty())
                ->key('peaje', V::intval()->notEmpty());

            try {
                $RutaValidator->assert($postData);
                $postData = $resques->getParsedBody();

                $rutas = new Ruta();
                $rutas->nombre = $postData['nombre'];
                $rutas->id_ayuda = $postData['ayudante'];
                $rutas->tarifa_positivo = $postData['tarifa'];
                $rutas->salario_id = $postData['salario'];
                $rutas->tasa_id = $postData['tasa'];
                $rutas->descuento_id = $postData['descuento'];
                $rutas->kilometros = $postData['kilometros'];
                $rutas->combustible_id = $postData['combustible'];
                $rutas->peaje_id = $postData['peaje'];
            }catch (\Exeption $e){
                echo $e->getMessage();
            }     
        }
        return $this->renderHtml('agregarRuta.twig', [
            'peajes' => $peaje,
            'combustibles' => $combustible,
            'salarios' => $salario,
            'ayudas' => $ayuda,
            'tasas' => $tasa,
            'descuentos' => $descuento,
            'tarifas' => $tarifa
        ]);
    }

    public function getListRutaAction() 
    {
        $rutas = Ruta::all();
        return $this->renderHTML('listaRutas.twig', [
            'rutas' => $rutas,
        ]);
    }
}