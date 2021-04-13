<?php

namespace Core;

class Request {

    public $params = [];

    public function __construct() {

        if(isset($_POST)) {

            foreach($_POST as $key => $value) 
            {
                $this->params[$key] = stripslashes($value);
                $this->params[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                $this->params[$key] = trim($value);
            }
        }

        if(isset($_GET)) {

            foreach($_GET as $key => $value) 
            {
                $this->params[$key] = stripslashes($value);
                $this->params[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                $this->params[$key] = trim($value);
            }
        }

        return $this->params;

    }
}

// $test = new Request;
// var_dump($test->handle_params());