<?php
require "../helpers.php"; // NOSONAR S2003

$uri = $_SERVER['REQUEST_URI'];
$basePath = '/Courses/TravMed/worq-listings/public';
$uri = str_replace($basePath, '', $uri);

if (empty($uri)) {
    $uri = '/';
}

require basePath("router.php"); // NOSONAR S2003
