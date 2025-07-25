<?php

$config = require basePath("config/db.php"); // NOSONAR S2003
$db = new Database($config);

$listings = $db->query("SELECT * FROM listings")->fetchAll();

// Home page controller
loadView('listings/index-view', [
    'listings' => $listings,
]);