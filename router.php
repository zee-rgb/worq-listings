<?php

$routes = require basePath("routes.php"); // NOSONAR S2003

if (array_key_exists($uri, $routes)) {
    require basePath($routes[$uri]); // NOSONAR S2003
} else {
    http_response_code(404);
    require basePath($routes["/404"]); // NOSONAR S2003
}
