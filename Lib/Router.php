<?php
declare(strict_types=1);

namespace Lib;

use Lib\Route;

class Router
{
    public static function Dispatch(string $url) {
        try {
            
            $route = Router::ParseURL($url);
            
            $_controller = 'App\\Controllers\\' . $route->controller;
            
            $controller = new $_controller();
            
            $action = $route->action;
            
            $query = $route->query;
            
            if (method_exists($controller, $action)) {

                call_user_func_array([$controller, $action], $query);

            } else {

                require_once(BASE_PATH . '/App/Views/NotFound.php');

            }    
        } catch (\Throwable $th) {

            require_once(BASE_PATH . '/App/Views/NotFound.php');

        }
    }

    public static function ParseURL(string $url) {

        $parsed_url = parse_url($url);
    
        $_path = $parsed_url['path'];

        $tmp = explode('/', $_path);

        if(count($tmp) == 2) {

            $controller = null;

            $action = $tmp[1];

            if($action == '') $action = null;

        } else {

            $controller = $tmp[1] ?? null;

            if($controller == '') $controller = null;
    
            $action = $tmp[2] ?? null;
            
            if($action == '') $action = null;
    
        }

        return new Route($controller??null, $action??null, []);

    }
}
