<?php
require "../vendor/autoload.php";

use League\Plates\Engine;
$templates = new League\Plates\Engine('../app/views');

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\controllers\HomeController', 'homepage']);
    $r->addRoute('GET', '/about', ['App\controllers\HomeController', 'about']);
    $r->addRoute('GET', '/categories', ['App\controllers\CategoryController', 'getAll']);



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
    



    $r->addRoute('GET', '/login', ['App\controllers\LoginController', 'index']);
    $r->addRoute('GET', '/register', ['App\controllers\RegisterController', 'index']);



    $r->addRoute('GET', '/adminpanel', ['App\controllers\HomeController', 'adminPanel']);
    $r->addRoute('GET', '/postcontrol', ['App\controllers\PostController', 'controlPost']);
    $r->addRoute('GET', '/categorycontrol', ['App\controllers\CategoryController', 'control']);


    $r->addRoute('GET', '/profile', ['App\controllers\UserController', 'userProfile']);
    $r->addRoute('GET', '/editpassword', ['App\controllers\UserController', 'changePassword']);
    $r->addRoute('GET', '/myposts', ['App\controllers\UserController', 'userPosts']);






    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
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
        $controller = new $handler[0];

        call_user_func([$controller,$handler[1]],$vars);
        break;
}