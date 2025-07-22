<?php

class Router
{
    protected $routes = [];

    /**
     * Summary of registerRoute
     * @param mixed $method
     * @param mixed $uri
     * @param mixed $controller
     * @return void
     */
    public function registerRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            "method" => $method,
            "uri" => $uri,
            "controller" => $controller
        ];
    }


    /**
     * Add GET route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->registerRoute("GET", $uri, $controller);
    }

    /**
     * Add POST route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function post($uri, $controller)
    {
        $this->registerRoute("POST", $uri, $controller);
    }

    /**
     * Add PUT route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function put($uri, $controller)
    {
        $this->registerRoute("PUT", $uri, $controller);
    }

    /**
     * Delete route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function delete($uri, $controller)
    {
        $this->registerRoute("DELETE", $uri, $controller);
    }


    /**
     * Load an error view
     *
     * @param int $code
     * @return void
     */
    public function error($code = 404)
    {
        http_response_code($code);
        loadView("error/{$code}-view");
        exit;
    }


    /**
     * Route the request
     *
     * @param string $uri
     * @param string $method
     * @return void
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require basePath($route['controller']); //NOSONAR S2003
                return;
            }
        }
        $this->error();
    }
}