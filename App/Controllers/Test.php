<?php
declare (strict_types=1);

namespace App\Controllers;

use Lib\Controller;

class Test extends Controller {
    
    public function index() {
        return $this->view();
    }

    public function details() {
        return $this->view();
    }
}
