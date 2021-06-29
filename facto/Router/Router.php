<?php

namespace Facto\Router;

class Router
{
    private array $routes = [];

    public function match()
    {
        if (array_key_exists($_SERVER['REQUEST_URI'], $this->routes)) {
            if (in_array($_SERVER['REQUEST_METHOD'], $this->routes[$_SERVER['REQUEST_URI']]['methods'])) {
                call_user_func($this->routes[$_SERVER['REQUEST_URI']]['callback']);
            } else {
                echo 'La méthode ' . $_SERVER['REQUEST_METHOD'] . ' n\'est pas autorisé pour cette route.';
            }
        } else {
            $this->get404();
        }
    }

    public function addRoute(string $path, string $method, $callback, string $name = null)
    {
        $methods = explode('|', $method);
        list($controller, $method) = explode('::', $callback);
        $this->routes[$path]['name'] = trim($name);
        $this->routes[$path]['methods'] = $methods;
        $this->routes[$path]['callback'] = [new $controller, $method];
    }

    public function path(string $route)
    {
        // dump(in_array($route, $this->routes))
        
        // if(in_array($route, $this->routes)) {
        // }
        // header('Location: /');
    }

    private function get404() {
        header('HTTP/1.0 404 Not Found');
        echo 'Page non trouvée';
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}
