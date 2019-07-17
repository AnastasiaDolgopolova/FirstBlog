<?php
require "../vendor/autoload.php";

use League\Plates\Engine;
$templates = new League\Plates\Engine('../app/views');

$routes = [
    "/" => 'app/controllers/homepage.php',
    "/about" => 'app/views/about.php',
    "/add" => 'app/views/post/create.php',
    "/delete" => 'app/controllers/delete.php',
    "/edit" => 'app/views/post/edit.php',
    "/show" => 'app/views/post/post-page.php',
    "/store" => 'app/controllers/store.php',
    "/update" => 'app/controllers/update.php',
    "/login" =>   'app/views/auth/authorization.php',
    "/register" =>   'app/views/auth/register.php',
    "/adminpanel" => 'app/views/admin/admin-panel.php',
    "/postcontrol" => 'app/views/admin/admin-posts.php',
    "/profile" => 'app/views/user/profile.php',
    "/editpassword" => 'app/views/user/editpass.php',
    "/myposts" => 'app/views/user/userposts.php',
    "/categoryposts" => 'app/views/category-page.php',
    "/categories" => 'app/views/admin/category/admin-categories.php',
    "/addcategory" => 'app/views/admin/category/create.php',
    "/editcategory" => 'app/views/admin/category/edit.php'
];

$route = $_SERVER['REQUEST_URI'];

$get_param = stripos($route, '?');//использование функция strpos ( поиск вхождения одной строки в другую) при сопоставлении роута и url'a;
if($get_param !== false){
    $route = substr($route, 0, $get_param);
}
if(array_key_exists($route, $routes)) {
    require_once __DIR__ . '/../'. $routes[$route];
    die;
} else {
    require_once __DIR__ . '/../app/views/404.php';
}
