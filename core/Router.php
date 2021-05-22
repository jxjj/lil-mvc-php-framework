<?php

namespace App\Core;

class Router
{
  protected array $routes_array = [];

  public function __construct()
  {
  }

  public function get(string $route, callable $fn)
  {
    $this->routes_array["GET"][$route] = $fn;
  }

  public function get_response(string $method, string $route)
  {
    $response_func = $this->routes_array[$method][$route];
    return $response_func ?? null;
  }
}
