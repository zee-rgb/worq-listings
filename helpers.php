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

function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.php");

    if (file_exists($viewPath)) {
        extract($data);
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
    $partialPath = basePath("App/views/partials/{$name}.php");

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


/**
 * Inspect value(s)
 *
 * @param mixed $value
 * @return void
 */

function inspect($value)
{
    echo "<pre>";

    var_dump($value);
    echo "<br>";
    print_r($value);

    echo "</pre>";
}