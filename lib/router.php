<?php

class Router {
    private $routes;

    public function __construct(array $routes) {
        $this->routes = $routes;
    }

    public function dispatch($url) {
        if (array_key_exists($url, $this->routes)) {
            return $this->routes[$url];
        } else {
            throw new Exception("Route not found");
        }
    }
}