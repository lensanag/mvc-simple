<?php
declare(strict_types=1);

namespace Lib;

class Json {

    public function __invoke(array $payload) {

        header("Content-Type: text/json; charset=UTF-8");

        print json_encode($payload);

    }
}