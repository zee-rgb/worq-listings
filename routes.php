<?php

$router->get("/", controller: "controllers/home.php");
$router->get("/index.html", "controllers/home.php");
$router->get("/listings", "controllers/listings/index.php");
$router->get("/listings/create", "controllers/listings/create.php");