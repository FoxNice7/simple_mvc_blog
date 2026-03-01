<?php

namespace App;

class Router
{
    private array $routes = [];

    public function get(string $path, callable|array $callback)
    {
        $this->routes['GET'][$path] = $callback;
        return $this;
    }
    public function post(string $path, callable|array $callback)
    {
        $this->routes['POST'][$path] = $callback;
        return $this;
    }

   public function resolve() {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['REQUEST_URI'];
    $path = explode('?', $path)[0];

    foreach ($this->routes[$method] as $route => $callback) {
        $pattern = preg_replace('#\{[\w]+\}#', '([\w-]+)', $route);
        $pattern = "#^$pattern$#";

        if (preg_match($pattern, $path, $matches)) {
            array_shift($matches);
            
            if (is_array($callback)) {
                [$class, $method] = $callback;
                $controller = new $class();
                return call_user_func_array([$controller, $method], $matches);
            }
            if($callback === null){
                http_response_code(404);
                echo '404 Not Found';
        
            }

            return call_user_func_array($callback, $matches);
        }
    }
}
}