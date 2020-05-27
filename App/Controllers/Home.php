<?php
declare(strict_types=1);

namespace App\Controllers;

class Home {

    public function index() {
        require(BASE_PATH . '/App/Views/Home/index.php');
    }

    public function saludo() {
        require(BASE_PATH . '/App/Views/Home/saludo.php');
    }
}
