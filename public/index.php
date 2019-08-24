<?php

ini_set('display_errors', 1); //inicializa errores
ini_set('display_starup_error', 1); //inicializa errores
error_reporting(E_ALL); //mostrar errores en pantalla

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;

session_start();

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();



$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => getenv('DB_DRIVER'),
    'host'      => getenv('DB_HOST'),
    'port'      => getenv('DB_PORT'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
    ]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

/**PASSWORD */
password_hash('superSecurePaswd', PASSWORD_DEFAULT);

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
$map->get('index', '/web-coodetrans/', [
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

$map->get('Vechicle', '/web-coodetrans/vehiculo/add', [
    'controller' => 'App\Controllers\VehiculoController',
    'action' => 'getAddVehiculoAction'
]);

$map->get('listaVehiculos', '/web-coodetrans/vehiculo/lista', [
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

/**Listar tiempos */
$map->get('saveTiempo', '/web-coodetrans/tiempos/costaRicaCali/add', [
    'controller' => 'App\Controllers\TiempoController',
    'action' => 'getTiemposAction'
]);

$map->get('listaTiempo', '/web-coodetrans/tiempos/costaRicaCali/lista', [
    'controller' => 'App\Controllers\TiempoController',
    'action' => 'getListTiempoAction'
]);

$map->post('addTiempo', 'web-coodetrans/tiempos/costaRicaCali/add', [
    'controller' => 'App\Controllers\TiempoController',
    'action' => 'getTiemposAction'
]);

/**AGREGAR USUARIOS */
/**Listar tiempos */
$map->get('agregarUsuario', '/web-coodetrans/usuario/add', [
    'controller' => 'App\Controllers\UsuarioController',
    'action' => 'getaddUser'
]);


$map->post('guardarUsuario', '/web-coodetrans/usuario/add', [
    'controller' => 'App\Controllers\UsuarioController',
    'action' => 'postSaveUser'
]);

/**Logear */
$map->get('LoginForm', '/web-coodetrans/Login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);

$map->get('logout', '/web-coodetrans/Logout',[
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout'
]);

$map->post('auth', '/web-coodetrans/auth',[
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'
]);



$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    $response = new HtmlResponse('No route found!', 404);
    exit;
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller']; //va a instanciar el contenido de la variable
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? null;

    $sessionUserID = $_SESSION['userID'] ?? null;
    if($needsAuth && !$sessionUserID) {
        $response = new RedirectResponse('/web-coodetrans/Login');
    }


    $controller = new $controllerName();
    $response = $controller->$actionName($request);
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }
        http_response_code($response->getStatusCode());
        echo $response->getBody();
}
