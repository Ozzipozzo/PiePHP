<?php


use \Core\Controller, \Core\Request;

class UserController extends \Core\Controller {

    private $model;
    private $email;
    private $password;
    private $request;


    public function __construct() {
        $this->request = new Request;
        $this->model = new UserModel;
    }

    public function loginAction() {
        $this->render('login');
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            $this->model->login();
        }
    }

    public function registerAction() {
        $this->render('register');
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            $this->model->create();
        }
    }

    public function addAction() {
        echo 'add action bro';
    }
}