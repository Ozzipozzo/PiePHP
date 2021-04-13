<?php

namespace Core;

class Controller {

    protected static $_render;

   protected function render($view, $scope = []) {
    extract($scope);

    $path = basename(get_class($this));
    $path = explode('\\', $path);
    $path = end($path);

    $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', $path), $view]) . '.php';
    
    if(file_exists($f)) {
        ob_start();
        include($f);
        $view = ob_get_clean();
        
        include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
    }
   }

}