<?php
declare(strict_types=1);

namespace App\Controllers;

use Lib\Controller;

class Home extends Controller {

    public function index() {

        $this->view();

    }

    public function saludo() {

        $this->view();

    }

}
