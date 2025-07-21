<?php

/**
 * Get the base path
 *
 * @param string $path
 * @return string
 */

function basePath($path = "")
{
    return __DIR__ . "/" . $path;
}

/**
 * Load a view file
 *
 * @param string $name
 * @return void
 */

function loadView($name)
{
    $viewPath = basePath("views/{$name}-view.php");

    if (file_exists($viewPath)) {
        require $viewPath; // NOSONAR S2003
    } else {
        echo "View file not found: {$viewPath}";
    }
}

/**
 * Load a partial
 *
 * @param string $name
 * @return void
 */

function loadPartial($name)
{
    $partialPath = basePath("views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        require $partialPath; // NOSONAR S2003
    } else {
        echo "Partial file not found: {$name}";
    }
}

/**
 * Inspect value(s) and die
 *
 * @param mixed $value
 * @return void
 */

function inspectAndDie($value)
{
    echo "<pre>";

    var_dump($value);
    echo "<br>";
    print_r($value);

    echo "</pre>";
    die("Inspection complete.");
}
