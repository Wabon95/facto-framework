<?php

use Facto\Router\Router;
require '../vendor/autoload.php';
require '../facto/config.php';


$router = new Router();
$router->addRoute('/', 'GET|POST', 'App\Controller\HomeController::home');

$router->match();
dump($router->getRoutes());
dump($_SERVER); 