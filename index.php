<?php

namespace App;

use App\Core\Application;

require __DIR__ . "/vendor/autoload.php";

$app = new Application();

$app->router->get("/", function () {
  echo "Hello World!";
});

$app->run();
