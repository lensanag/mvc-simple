<?php
declare(strict_types=1);

define('BASE_PATH', __DIR__);

require_once BASE_PATH . '/Utils/Autoloader.php';

$directories = require BASE_PATH . '/config/directories.php';

Utils\Autoloader::Register($directories);

Lib\Router::Dispatch($_SERVER['REQUEST_URI']);
