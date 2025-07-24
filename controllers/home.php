<?php

$config = require basePath("config/db.php"); // NOSONAR S2003
$db = new Database($config);

$listings = $db->query("SELECT * FROM listings LIMIT 6")->fetchAll();

// Home page controller
loadView('home-view', [
    'listings' => $listings,
]);