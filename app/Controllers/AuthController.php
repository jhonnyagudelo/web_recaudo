<?php

namespace App\Controllers;

use App\Models\Usuario;
use Zend\Diactoros\Response\RedirectResponse;


class AuthController extends BaseController {

    public function getLogin()
    {
        return $this->renderHTML('Login.twig');
    }

    public function postLogin($request){

        $postData = $request->getParsedBody();
        $user = Usuario::where('username', $postData['username'])->first();
        if($user){
            if(\password_verify($postData['password'], $user->password)){
                if($user->status == 't'){
                    $_SESSION['userID'] = $user->usuario_id;
                    return new RedirectResponse('/web-coodetrans/rodamiento/add');
                    // date_default_timezone_set('America/Bogota');
                    // $date->setTimestamp;
                    // $ultimo_login = $user
                }else{
                    echo 'El usuario ha sido desactivado';                    
                }
            }else {
                echo 'Nombre ó usuario errados';
            }
        }else{
            echo 'Nombre ó usuario errados';
        }

        return $this->renderHTML('Login.twig');
    }

    public function getLogout(){
        unset($_SESSION['userID']);
        return new RedirectResponse('/web-coodetrans/Logout');
    }
}