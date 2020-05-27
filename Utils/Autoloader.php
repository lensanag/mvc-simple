<?php
declare(strict_types=1);

namespace Utils;

class Autoloader {

    public static function Register(Array $directories) {

        foreach($directories as $directory) {

            if($handle = opendir($directory)) {
      
              while (false !== ($file = readdir($handle))) {
      
                if ($file == '.' || $file == '..') continue;
      
                require($directory . "/" . $file);

              }
      
            }
      
        }
    }
}
