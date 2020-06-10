<?php
declare(strict_types=1);

namespace Lib;

class Connection
{
    public function __invoke() {

        $connection = require_once(BASE_PATH . '/config/connection.php');
        $data = $connection['credentials'];
        $options = $connection['options'];
        $dsn = $data['driver'].':host='.$data['host'].';dbname='.$data['db'].';port='.$data['port'];
        
        return new \PDO($dsn, $data['user'], $data['password'], $options);
    }
}