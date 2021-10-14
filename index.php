<?php
session_start();
require 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Controllers\dataController;
$dataController = new dataController();
$loader = new FilesystemLoader('app/Views/');
$twig = new Environment($loader);

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'dataController@index');
    $r->addRoute('GET', '/data', 'dataController@data');
    $r->addRoute('GET', '/registration', 'dataController@registration');
    $r->addRoute('POST', '/add', 'dataController@addRec');
    $r->addRoute('POST', '/del', 'dataController@delete');
    $r->addRoute('POST', '/register', 'dataController@addUser');
    $r->addRoute('POST', '/login', 'dataController@login');


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
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controller, $method] = explode("@", $handler);
        $controller = 'App\Controllers\\' . $controller;
        $controller = new $controller();
        $controller->$method();
        echo $twig->render( "$method.html.twig", ['data' => $dataController->$method()]);
        var_dump($dataController->$method());
        break;
}



