<?php

namespace app\controllers;

use app\models\Curriculum;
use app\Router;

class CvGeneratorController
{

    public function index(Router $router)
    {
        return $router->render("cv-generator/index-pt");
    }

    public function curriculum(Router $router)
    {
        $curriculum = new Curriculum($_POST);

        if (empty($curriculum->errorsArr)) {
            $curriculum->generatePDF();
        } else {
            header("Location: /index?" . http_build_query($curriculum->errorsArr));
            exit();
        }
    }
}
