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
    'action' => 'getAddRodamientoAction',
    'auth'=> true
]);

$map->post('guardarRodamientos', '/web-coodetrans/rodamiento/add', [
    'controller' => 'App\Controllers\RodamientoController',
    'action' => 'getAddRodamientoAction',
    'auth'=> true
]);

$map->get('listaRodamiento', '/web-coodetrans/rodamiento/lista', [
    'controller' => 'App\Controllers\RodamientoController',
    'action' => 'getListRodamientoAction',
    'auth'=> true
]);

/**
 * sesion de los vehiculos
 */

$map->get('Vechicle', '/web-coodetrans/vehiculo/add', [
    'controller' => 'App\Controllers\VehiculoController',
    'action' => 'getAddVehiculoAction',
    'auth'=> true
]);

$map->get('listaVehiculos', '/web-coodetrans/vehiculo/lista', [
    'controller' => 'App\Controllers\VehiculoController',
    'action' => 'getListVehiculoAction',
    'auth'=> true
]);

$map->post('addVehicle', '/web-coodetrans/vehiculos/add', [
    'controller' => 'App\Controllers\VehiculoController',
    'action' => 'getAddVehiculoAction',
    'auth'=> true
]);

/**lista personas */

$map->get('personas', '/web-coodetrans/persona/add', [
    'controller' => 'App\Controllers\PersonasController',
    'action' => 'getAddPersonasAction',
    'auth'=> true
]);

$map->get('listPersonas', '/web-coodetrans/persona/lista', [
    'controller' => 'App\Controllers\PersonasController',
    'action' => 'getListPersonAction',
    'auth'=> true
]);

$map->post('addPersona', '/web-coodetrans/persona/add', [
    'controller' => 'App\Controllers\PersonasController',
    'action' => 'getAddPersonasAction',
    'auth'=> true
]);

/**Listar turnos */

$map->get('turnos', '/web-coodetrans/turno/add', [
    'controller' => 'App\Controllers\TurnoController',
    'action' => 'getAddTurnoAction',
    'auth'=> true
]);

$map->get('listTurnos', '/web-coodetrans/turno/lista', [
    'controller' => 'App\Controllers\TurnoController',
    'action' => 'getListTurnoAction',
    'auth'=> true
]);

$map->post('addTurnos', '/web-coodetrans/turno/add', [
    'controller' => 'App\Controllers\TurnoController',
    'action' => 'getAddTurnoAction',
    'auth'=> true
]);

/**Listar rutas */

$map->get('Ruta', '/web-coodetrans/ruta/add', [
    'controller' => 'App\Controllers\RutasController',
    'action' => 'getAddRutasAction',
    'auth'=> true
]);

$map->get('listRuta', '/web-coodetrans/turno/lista', [
    'controller' => 'App\Controllers\RutasController',
    'action' => 'getListTurnoAction',
    'auth'=> true
]);

$map->post('addRuta', '/web-coodetrans/turno/add', [
    'controller' => 'App\Controllers\RutasController',
    'action' => 'getAddRutasAction',
    'auth'=> true
]);

/**Listar tiempos */
$map->get('saveTiempo', '/web-coodetrans/tiempos/costaRicaCali/add', [
    'controller' => 'App\Controllers\TiempoController',
    'action' => 'getTiemposAction',
    'auth'=> true
]);

$map->get('listaTiempo', '/web-coodetrans/tiempos/costaRicaCali/lista', [
    'controller' => 'App\Controllers\TiempoController',
    'action' => 'getListTiempoAction',
    'auth'=> true
]);

$map->post('addTiempo', 'web-coodetrans/tiempos/costaRicaCali/add', [
    'controller' => 'App\Controllers\TiempoController',
    'action' => 'getTiemposAction',
    'auth'=> true
]);

/**AGREGAR USUARIOS */
/**Listar tiempos */
$map->get('agregarUsuario', '/web-coodetrans/usuario/add', [
    'controller' => 'App\Controllers\UsuarioController',
    'action' => 'getaddUser',
    'auth'=> true
]);


$map->post('guardarUsuario', '/web-coodetrans/usuario/add', [
    'controller' => 'App\Controllers\UsuarioController',
    'action' => 'postSaveUser',
    'auth'=> true

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
    'action' => 'postLogin',
]);




/**Noo found */
$map->get('noFound', '/web-coodetrans/indexControl',[
    'controller' => 'App\Controllers\adminControlController',
    'action' => 'getIndexControl'
]);


/**Noo found */
// $map->get('noFound', '/web-coodetrans/noFound',[
//     'controller' => 'App\Controllers\NoFoundController',
//     'action' => 'getNoFound'
// ]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    $html= 'No route found!';
    $responder = new HtmlResponse($html, 404);
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller']; //va a instanciar el contenido de la variable
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserID = $_SESSION['userID'] ?? null;
    // $sesseionUSerPerfil = $_SESSION['perfil'] ?? null;
    // $sesseionUSerNombre= $_SESSION['nombreID'] ?? null;

    if($needsAuth && !$sessionUserID) {
        // $responsed = new RedirectResponse('/web-coodetrans/Login');
        $controllerName = 'App\controllers\AuthController';
        $actionName = 'getLogin';
        $_SESSION['mensaje'] = 'Ruta protegida debe ingresar su usuario y contraseña';
        
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
