<?php

<<<<<<< HEAD
=======
ini_set('display_errors', 1); //inicializa errores
ini_set('display_starup_error', 1); //inicializa errores
error_reporting(E_ALL);//mostrar errores en pantalla

require_once '../vendor/autoload.php';



use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'pgsql',
    'host'      => 'localhost',
    'port'      =>  '5432',
    'database'  => 'recaudo_prueba',
    'username'  => 'postgres',
    'password'  =>  '1113645020',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
    ]);



// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();



$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index', '/web-coodetrans/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);

$map->get('addJob', '/curso-php/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);

$map->post('saveJob', '/curso-php/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);


$map->get('addProject', '/curso-php/project/add',[
    'controller' => 'App\Controllers\ProjectController',
    'action' => 'getAddProjectAction'
]);

$map->post('saveProject', '/curso-php/project/add',[
    'controller' => 'App\Controllers\ProjectController',
    'action' => 'getAddProjectAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);


if(!$route) {
    echo 'No route found';
    exit;
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller']; //va a instanciar el contenido de la variable
    $actionName = $handlerData['action'];

    $controller = new $controllerName();
    $response = $controller->$actionName($request);

    echo $response->getBody();

}



>>>>>>> 909a4074f455ea7205d878e2b8271ffd8239400c
