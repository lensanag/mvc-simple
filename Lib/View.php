<?php
declare(strict_types=1);

namespace Lib;

class View {

    public function __invoke(array $payload, string $viewPath) {

        \extract($payload, EXTR_SKIP);

        return require($viewPath);

    }   

}