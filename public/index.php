<?php
if( !session_id() ) @session_start();

require "../vendor/autoload.php";

use DI\ContainerBuilder;
use Delight\Auth\Auth;
use League\Plates\Engine;
$templates = new League\Plates\Engine('../app/views');

$ContainerBuilder = new ContainerBuilder();
$ContainerBuilder->addDefinitions(array(
    Engine::class => function () {
        return new Engine('../app/views');
    },
    PDO::class => function () {
        $driver = "mysql";
        $host = "localhost";
        $db_name = "app3";
        $user = "root";
        $password = "";
        return new PDO("$driver:host=$host;dbname=$db_name", $user, $password);
    },
    Auth::class => function ($container) {
        return new Auth($container->get('PDO'));
    },
    QueryFactory::class => function () {
        return new QueryFactory('mysql');
    },
    ImageManager::class => function () {
        return new ImageManager(array('driver' => 'imagick'));
    }
));
$container = $ContainerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\controllers\HomeController', 'homepage']);
    $r->addRoute('GET', '/about', ['App\controllers\HomeController', 'about']);
    $r->addRoute('GET', '/categories', ['App\controllers\CategoryController', 'getAll']);



    $r->addRoute('GET', '/register', ['App\controllers\RegisterController', 'index']);
    $r->addRoute('POST', '/register', ['App\controllers\RegisterController', 'register']);
    $r->addRoute('GET', '/forgot_password', ['App\controllers\RegisterController', 'show_recovery_form']);
    $r->addRoute('POST', '/recovery_password', ['App\controllers\RegisterController', 'recovery_password']);
    $r->addRoute('GET', '/recovery', ['App\controllers\RegisterController', 'vefify_recovery']);
    $r->addRoute('POST', '/new_password', ['App\controllers\RegisterController', 'new_password']);
    $r->addRoute('GET', '/verify', ['App\controllers\RegisterController', 'verify_email']);
    $r->addRoute('GET', '/changemail', ['App\controllers\VerifyController', 'change_email']);


     $r->addRoute('GET', '/login', ['App\controllers\LoginController', 'index']);
    $r->addRoute('POST', '/login', ['App\controllers\LoginController', 'login']);
    $r->addRoute('GET', '/logout', ['App\controllers\LoginController', 'logout']);




    $r->addRoute('GET', '/show/{id:\d+}', ['App\controllers\PostController', 'show']);
    $r->addRoute('GET', '/add', ['App\controllers\PostController', 'add']);
    $r->addRoute('POST', '/store', ['App\controllers\PostController', 'create']);
    $r->addRoute('GET', '/edit/{id:\d+}', ['App\controllers\PostController', 'edit']);
    $r->addRoute('POST', '/update/{id:\d+}', ['App\controllers\PostController', 'update']);

    $r->addRoute('GET', '/delete/{id:\d+}', ['App\controllers\PostController', 'delete']);
    


    $r->addRoute('GET', '/categoryposts', ['App\controllers\CategoryController', 'getCategory']);
    $r->addRoute('GET', '/addcategory', ['App\controllers\CategoryController', 'add']);
     $r->addRoute('POST', '/storecategory', ['App\controllers\CategoryController', 'create']);
    $r->addRoute('GET', '/editcategory/{id:\d+}', ['App\controllers\CategoryController', 'edit']);
    $r->addRoute('POST', '/updatecategory/{id:\d+}', ['App\controllers\CategoryController', 'update']);
    $r->addRoute('GET', '/deletecategory/{id:\d+}', ['App\controllers\CategoryController', 'delete']);



    $r->addRoute('GET', '/adminpanel', ['App\controllers\HomeController', 'adminPanel']);
    $r->addRoute('GET', '/postcontrol', ['App\controllers\PostController', 'controlPost']);
    $r->addRoute('GET', '/categorycontrol', ['App\controllers\CategoryController', 'control']);


    $r->addRoute('GET', '/profile', ['App\controllers\UserController', 'userProfile']);
    $r->addRoute('GET', '/editpassword', ['App\controllers\UserController', 'changePassword']);
    $r->addRoute('GET', '/myposts', ['App\controllers\UserController', 'userPosts']);

});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo $templates->render('404');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "Не разрешен";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($routeInfo[1], $routeInfo[2]);
        break;
}