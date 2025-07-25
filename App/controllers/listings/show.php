<?php

$config = require basePath("config/db.php"); // NOSONAR S2003
$db = new Database($config);

$id = $_GET['id'] ?? '';

$param = [
    'id' => $id
];

$listing = $db->query("SELECT * FROM listings WHERE id = :id", $param)->fetch();

// Load the show view with the listing data
loadView('listings/show-view', [
    'listing' => $listing
]);