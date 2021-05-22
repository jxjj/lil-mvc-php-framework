<?php

namespace App\Core;

use App\Core\Router;

class Application
{
  public Router $router;

  public function __construct()
  {
    $this->router = new Router();
  }

  public function run()
  {
    $request_uri = trim($_SERVER["REQUEST_URI"]);
    $request_method = $_SERVER["REQUEST_METHOD"];
    $response_function = $this->router->get_response(
      $request_method,
      $request_uri
    );

    call_user_func($response_function);
  }
}
