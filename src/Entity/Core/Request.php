<?php

namespace Entity\Core;

use Service\Core\Utils;

class Request {

    public function get(string $key) {
        return $_GET[$key] ?? null;
    }

    public function post(string $key) {
        return $_POST[$key] ?? null;
    }

    public function cookie(string $key) {
        return $_COOKIE[$key] ?? null;
    }

    public function session(string $key) {
        return $_SESSION[$key] ?? null;
    }

    public function url(): ?string {
        return Utils::getUrlWithoutParams($_SERVER['REQUEST_URI']);
    }

    public function requestMethod(): ?string {
        return $_SERVER['REQUEST_METHOD'] ?? null;
    }
}