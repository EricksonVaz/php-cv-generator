<?php

namespace app;

use app\models\Curriculum;
use Exception;

class Router
{

    public array $getArr = [];
    public array $postArr = [];

    public function get($path, $fn)
    {
        $this->getArr[$path] = $fn;
    }

    public function post($path, $fn)
    {
        $this->postArr[$path] = $fn;
    }


    public function run()
    {
        $request_uri = $_SERVER["REQUEST_URI"] ?? "/index";
        $method = $_SERVER["REQUEST_METHOD"] ?? "GET";

        $path = explode("?", $request_uri)[0];

        $fn = null;

        try {
            if ($method == "GET") {
                $fn = isset($this->getArr[$path]) ? $this->getArr[$path] : null;
            } else if ($method == "POST") {
                $fn = isset($this->postArr[$path]) ? $this->postArr[$path] : null;
            } else {
                throw new Exception("Bad request, method not allowed");
            }

            if ($fn) {
                call_user_func($fn, $this);
            } else {
                throw new Exception("Page Not Found");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function render(string $view, array $params = [])
    {
        extract($params);

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean();

        require_once __DIR__ . "/views/_layout.php";
    }

    public static function getParrams($key)
    {
        return Curriculum::cleanInput($_GET[$key] ?? "");
    }

    public static function postParrams($key)
    {
        return Curriculum::cleanInput($_POST[$key] ?? "");
    }
}
