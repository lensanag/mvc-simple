<?php
declare(strict_types=1);

namespace App\Controllers;

use Lib\Controller;

use App\Models\User;


class Home extends Controller {

    private $model;

    public function __construct() {

        $this->model = new User();
    }

    public function index() {

        return $this->view();

    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {

            return $this->view();

        }

        $username = $_POST['username'];

        $password = password_hash($_POST['password'], 1);

        $sql = "INSERT INTO `users`(`username`, `password`) VALUES('" . $username . "','" . $password ."')";

        $this->model->exec($sql);

        header('Location: /login');

    }
    
    public function login($val = '/') {

        if($_SERVER['REQUEST_METHOD'] === 'GET') {

            return $this->view(['incomig' => $val]);

        }

        $username = $_POST['username'];

        $password = $_POST['password'];

        $sql = "SELECT `username`, `password` FROM `users` WHERE `username`='". $username ."';";

        $result = $this->model->exec($sql);

        $val = $result->fetch();

        $check = password_verify($password, $val['password']);

        if(!$check) {
            header('Location: /login');
            exit();
        }
        
        $val = $_POST['target'];

        $_SESSION['user'] = "hello";

        $redirect = urldecode($val);

        header('Location: ' .  $redirect);

        exit();
    }

    public function logout() {

        $_SESSION['user'] = null;

        header('Location: /login');

        exit();
    }
}
