<?php

namespace App\Core;

class Router
{
  protected array $routes = [];
  protected $fallbackFn;

  public function get(string $route, callable $fn)
  {
    $this->routes["GET"][$route] = $fn;
    $this->fallbackFn = self::defaultFallback();
  }

  private static function defaultFallback()
  {
    http_response_code(404);
  }

  public function fallback(callable $fn)
  {
    $this->fallbackFn = $fn;
  }

  public function resolve(string $method, string $route)
  {
    $responseFn = $this->routes[$method][$route] ?? $this->fallbackFn;
    return $responseFn;
  }
}
