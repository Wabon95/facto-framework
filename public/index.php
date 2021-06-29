<?php

use Facto\Router\Router;
require '../vendor/autoload.php';
require '../facto/config.php';
require '../src/App/Routes.php';

dump($router->getRoutes());
$router->match();