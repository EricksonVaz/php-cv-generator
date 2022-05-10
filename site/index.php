<?php

use app\controllers\CvGeneratorController;
use app\Router;

require_once __DIR__ . "/../vendor/autoload.php";

$router = new Router();

$router->get("/", [new CvGeneratorController(), "index"]);
$router->get("/index", [new CvGeneratorController(), "index"]);
$router->post("/curriculum", [new CvGeneratorController(), "curriculum"]);

$router->run();
