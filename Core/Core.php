<?php

namespace Core;

class Core {

    public function run() {
        // echo __CLASS__ . " [OK]" . PHP_EOL;
        // $route = substr($_SERVER['REQUEST_URI'], 16);
        // $test = new Controller;
        // $test->show($route);

        include_once 'src/routes.php';

        $url = substr($_SERVER['REQUEST_URI'], strlen(BASE_URI));
        // echo $url;
        $path = Router::get($url);
        // var_dump($path);

        $controller = ucfirst($path['controller']) . 'Controller';
        $action = $path['action'] . 'Action';
        // echo $controller;

        $test = new $controller();
        var_dump($test);
        $test->$action();

    }

}