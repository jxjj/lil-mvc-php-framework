<?php

namespace App\Core;

use App\Core\Router;
use App\Core\Request;

class Application
{
  public Router $router;

  public function __construct()
  {
    $this->router = new Router();
  }

  public function run()
  {
    $request = Request::createFromGlobals();

    $responderFn = $this->router->resolve(
      $request->getMethod(),
      $request->getPath()
    );

    if (!$responderFn) {
      echo "404";
      return;
    }

    call_user_func($responderFn);
  }
}
