<?php
require "../helpers.php"; // NOSONAR S2003
require basePath("Framework/Database.php"); // NOSONAR S2003
require basePath("Framework/Router.php"); // NOSONAR S2003

// Initialize the router
$router = new Router();

// Get routes from routes.php
$routes = require basePath("routes.php"); // NOSONAR S2003

// Get the request URI and method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$basePath = '/Courses/TravMed/worq-listings/public';
$uri = str_replace($basePath, '', $uri);

if (empty($uri)) {
    $uri = '/';
}

// Route the request
$router->route($uri, $method);