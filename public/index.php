<?php

ini_set('display_errors', 1); //inicializa errores
ini_set('display_starup_error', 1); //inicializa errores
error_reporting(E_ALL); //mostrar errores en pantalla

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
/**
 * sesion de los index
 */
$map->get('index', '/web-coodetrans/index/inicio', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);

/**
 * sesion de los rodamiento
 */
$map->get('rodamientos', '/web-coodetrans/rodamiento/add', [
    'controller' => 'App\Controllers\RodamientoController',
    'action' => 'getAddRodamientoAction'
]);

$map->post('guardarRodamientos', '/web-coodetrans/rodamiento/add', [
    'controller' => 'App\Controllers\RodamientoController',
    'action' => 'getAddRodamientoAction'
]);

$map->get('listaRodamiento', '/web-coodetrans/rodamiento/lista', [
    'controller' => 'App\Controllers\RodamientoController',
    'action' => 'getListRodamientoAction'
]);

/**
 * sesion de los vehiculos
 */

$map->get('Vechicle', '/web-coodetrans/vehiculos/add', [
    'controller' => 'App\Controllers\VehiculoController',
    'action' => 'getAddVehiculoAction'
]);

$map->get('listaVehiculos', '/web-coodetrans/vehiculos/lista', [
    'controller' => 'App\Controllers\VehiculoController',
    'action' => 'getListVehiculoAction'
]);

$map->post('addVehicle', '/web-coodetrans/vehiculos/add', [
    'controller' => 'App\Controllers\VehiculoController',
    'action' => 'getAddVehiculoAction'
]);

/**lista personas */

$map->get('personas', '/web-coodetrans/persona/add', [
    'controller' => 'App\Controllers\PersonasController',
    'action' => 'getAddPersonasAction'
]);

$map->get('listPersonas', '/web-coodetrans/persona/lista', [
    'controller' => 'App\Controllers\PersonasController',
    'action' => 'getListPersonAction'
]);

$map->post('addPersona', '/web-coodetrans/persona/add', [
    'controller' => 'App\Controllers\PersonasController',
    'action' => 'getAddPersonasAction'
]);

/**Listar turnos */

$map->get('turnos', '/web-coodetrans/turno/add', [
    'controller' => 'App\Controllers\TurnoController',
    'action' => 'getAddTurnoAction'
]);

$map->get('listTurnos', '/web-coodetrans/turno/lista', [
    'controller' => 'App\Controllers\TurnoController',
    'action' => 'getListTurnoAction'
]);

$map->post('addTurnos', '/web-coodetrans/turno/add', [
    'controller' => 'App\Controllers\TurnoController',
    'action' => 'getAddTurnoAction'
]);

/**Listar rutas */

$map->get('Ruta', '/web-coodetrans/ruta/add', [
    'controller' => 'App\Controllers\RutasController',
    'action' => 'getAddRutasAction'
]);

$map->get('listRuta', '/web-coodetrans/turno/lista', [
    'controller' => 'App\Controllers\RutasController',
    'action' => 'getListTurnoAction'
]);

$map->post('addRuta', '/web-coodetrans/turno/add', [
    'controller' => 'App\Controllers\RutasController',
    'action' => 'getAddRutasAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
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
