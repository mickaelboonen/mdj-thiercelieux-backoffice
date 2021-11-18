<?php

// automatic loading of classes
require_once '../vendor/autoload.php';

// Starting a session for the user with the PHPSESSID cookie creation
session_start();

// Router object that will manage routing through the app
$router = new AltoRouter();

// If "BASE_URI" exists in the $_SERVER, meaning if we are in a sub folder
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Then we set the router basePath with the BASE_URI
    // This way, our routes will match the URL after the sub folders listing
    $router->setBasePath($_SERVER['BASE_URI']);
}
else {
    // If we are here, there are no sub folders, so we set directly the BASE_URI as "/"
    $_SERVER['BASE_URI'] = '/';
}

// requiring all routes previously created in a dedicated file.
require __DIR__ . '/routes/index.php';

// adding all routes to the router
$router->addRoutes($routesArray);

// asking the router if there is a match between the current URL and one that is recorded in the router
// Returns array if match, false if no match
$match = $router->match();

/**
 * @param mixed $match
 * @param string path to the 404 Controller in case $match === false
 * Returns object
 */
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');

// Sets the name of the matched route to the dispatcher controllersArguments
$dispatcher->setControllersArguments($match['name']);

// Using the dispatch method of the dispatcher to display the right page through the appropriate method and controller
$dispatcher->dispatch();