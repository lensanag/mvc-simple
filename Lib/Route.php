<?php
declare(strict_types=1);

namespace Lib;

class Route
{
    public $controller;
    public $action;
    public $query;
    
    public function __construct(?string $controller, ?string $action, ?array $query) {
        $this->controller = $controller ?? 'Home';
        $this->action = $action ?? 'index';
        $this->query = $query;
    }
}
