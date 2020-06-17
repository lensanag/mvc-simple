<?php
declare(strict_types=1);

namespace Lib;

use Lib\View;

class Controller {

    public function view(array $payload = [], $view = '') {

        $items = explode('\\', get_class($this));

        $controller = array_pop($items);

        if($view === '') {
            $view = \debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];
        }

        $viewPath = BASE_PATH . "/App/Views/${controller}/${view}.php";

        $v = new View();

        return $v($payload, $viewPath);

    }

}