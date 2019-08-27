<?php
namespace App\Controllers;

class NoFoundController extends BaseController {
     public function getNoFound(){
        return $this->renderHTML('noFound.twig');
     }
}