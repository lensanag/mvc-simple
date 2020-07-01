<?php
declare(strict_types=1);

namespace Lib;

use Lib\Route;

class Router
{
    public static function Dispatch(string $url) {
        try {
            
            Router::SessionStart();

            $route = Router::ParseURL($url);
            
            $_controller = 'App\\Controllers\\' . $route->controller;

            if(!class_exists($_controller)) {

                return require_once(BASE_PATH . '/App/Views/NotFound.php');

            }
            
            $controller = new $_controller();
            
            $action = $route->action;
            
            $query = $route->query;
            
            if (!method_exists($controller, $action)) {

                return require_once(BASE_PATH . '/App/Views/NotFound.php');

            }
            
            if(Router::IsProtected($route) && !Router::IsAuthenticated()) {
                $redirect = '/login?origin=' . urlencode($url);
                header('Location: ' . $redirect);
                exit();
            }
            
            call_user_func_array([$controller, $action], $query);

        } catch (\Throwable $th) {

            return require_once(BASE_PATH . '/App/Views/NotFound.php');

        }
    }

    public static function ParseURL(string $url) {

        $parsed_url = parse_url($url);
    
        $_path = $parsed_url['path'];

        $_query = $parsed_url['query'] ?? '';

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

        $queryArgs = [];

        parse_str($_query, $queryArgs);

        return new Route($controller??null, $action??null, $queryArgs ?? []);

    }

    public static function SessionStart() {
        if(session_status() !== PHP_SESSION_NONE) {
            session_destroy();
        }
        session_start();
    }

    public static function IsAuthenticated() {
        $val2 = $_SESSION['user'] === 'hello';
        return $val2;
    }

    public static function IsProtected(Route $route) {

        $protected = require_once(BASE_PATH . '/config/protectedRoutes.php');

        if(!array_key_exists(strtolower($route->controller), $protected)) {

            return false;

        } else {

            if(!isset($protected[strtolower($route->controller)])) {

                return true;

            } else {
                return in_array(strtolower($route->action), $protected[strtolower($route->controller)]);
            }
        }
    }
}
