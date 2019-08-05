<?php
namespace App\Controllers;

use App\Models\{Rodamiento};

class IndexController extends BaseController {
    public function indexAction(){
        $rodamientos = Rodamiento::all();

        return $this->renderHTML('index.twig', [
            'rodamientos' => $rodamientos
        ]);
    }
}