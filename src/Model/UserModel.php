<?php

use Core\Database;

class UserModel extends \Core\Controller {

    private $dbh;
    private $email;
    private $password;
    
    public function __construct() {
        $this->dbh = new Database('PiePHP', 'root', 'abdelpci');
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
        }
    }

    public function login() {
        $check_mail = $this->email;
        $check_password = $this->password;
        $sql = "SELECT email, password FROM users WHERE email = '$check_mail' AND password = '$check_password' ";
        $req = $this->dbh->getDB()->query($sql);
        $response = $req->fetch();
        var_dump($response);
        if ($response == false) {
            echo "L'utilisateur n'existe pas";
        } else {
            echo "Connexion réussie";
        }
    }

    public function create() {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $req = $this->dbh->getDB()->prepare($sql);
        $req->BindParam(':email' , $this->email);
        $req->BindParam(':password', $this->password);
        $req->execute();
        echo "Vous êtes bien enregistré sur le site !";
    }

    public function read_all() {
        $sql = "SELECT * FROM users";
        $req = $this->dbh->getDB()->query($sql);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function read($id) {
        $sql = "SELECT * from users WHERE id = $id";
        $req = $this->dbh->getDB()->query($sql);
        $result = $req->fetch();
        return $result;
    }

    public function update($email, $password, $id) {
        $sql = "UPDATE users SET email='$email', password='$password' WHERE id='$id'";
        $req = $this->dbh->getDB()->prepare($sql);
        $req->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id='$id'";
        $req = $this->dbh->getDB()->prepare($sql);
        $req->execute();
    }




}