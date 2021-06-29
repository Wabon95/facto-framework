<?php

use Facto\Router\Router;

$router = new Router();

$router->addRoute('/', 'GET', 'App\Controller\HomeController::home', 'home');