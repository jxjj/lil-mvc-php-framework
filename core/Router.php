<?php

namespace App\Core;

class Router
{
  protected array $routes = [];

  public function get(string $route, callable $fn)
  {
    $this->routes["GET"][$route] = $fn;
  }

  public function resolve(string $method, string $route)
  {
    $responseFn = $this->routes[$method][$route] ?? null;
    return $responseFn;
  }
}
