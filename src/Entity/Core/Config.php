<?php

namespace Entity\Core;

class Config {

    private array $db;

    public function __construct(array $config) {
        $this->db = $config['db_config'] ?? [];
    }

    public function db(): array {
        return $this->db;
    }
}