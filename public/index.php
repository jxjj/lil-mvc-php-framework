<?php

namespace App;

use App\Core\Application;
use App\Core\Template;

require __DIR__ . "/../vendor/autoload.php";

$app = new Application();

$app->router->get("/", function () {
  $page = Template::make("home", [
    "name" => "World!",
    "documentTitle" => "Hello",
  ]);
  return $page;
});

$app->run();
