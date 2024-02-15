<?php

require_once 'lib/router.php';
require_once 'controller/home.php';
require_once 'controller/placeholder.php';

// Define routes
$routes = [
    '/' => 'HomeController@index',
    '/placeholder' => 'PlaceholderController@index'
    // Add more routes here
];

$appVersion = '0.1.0';

// Get the requested URL
$requestUrl = $_SERVER['REQUEST_URI'];

// Initialize the router
$router = new Router($routes);

try {
    // Dispatch the request to the appropriate controller and action
    $controllerAction = $router->dispatch($requestUrl);
    
    // Extract controller and action from the dispatched value
    list($controllerName, $actionName) = explode('@', $controllerAction);
    
    // Create an instance of the controller
    $controller = new $controllerName();
    
    // Call the action method on the controller
    $controller->$actionName();
} catch (Exception $e) {
    // Handle exceptions
    echo 'Error: ' . $e->getMessage();
}