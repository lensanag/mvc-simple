<?php
declare (strict_types=1);

namespace App\Controllers;

class User {   
    
    public function index() {
        require (BASE_PATH . '/App/Views/User/index.php');
    }
}
