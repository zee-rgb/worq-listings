<?php
require "../helpers.php"; // NOSONAR S2003

require basePath("Router.php"); // NOSONAR S2003

$router = new Router();
$routes = require basePath("routes.php"); // NOSONAR S2003


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$basePath = '/Courses/TravMed/worq-listings/public';
$uri = str_replace($basePath, '', $uri);

if (empty($uri)) {
    $uri = '/';
}

$router->route($uri, $method);