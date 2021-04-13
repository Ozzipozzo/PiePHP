<?php

use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']) ;
Router::connect('/register', ['controller' => 'user', 'action' => 'register']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);