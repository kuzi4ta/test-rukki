<?php

class Autoloader {
    public static function register() {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            $pathToFile = __DIR__ . '/' .$file;
            if (file_exists($pathToFile)) {
                require_once $pathToFile;
                return true;
            }
            return false;
        });
    }
}
