<?php

namespace classes;

class Autoloader {
    public static function AutoloaderFunction() {
        spl_autoload_register(function ($class) {
            $class = str_replace('classes\\', '', $class);
            $FileName = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
            $FullPath = __DIR__ . DIRECTORY_SEPARATOR . $FileName;
            if (file_exists($FullPath)) {
                require_once $FullPath;
            } else {
                die("Error: Class $class not found in $FullPath\n");
            }
        });
    }
}
