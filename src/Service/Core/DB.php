<?php

namespace Service\Core;

use Entity\Core\Config;
use mysqli;

class DB extends BaseService {

    protected mysqli $db;
    private array $dbConfig;

    public function __construct(Config $config) {
        mysqli_report(MYSQLI_REPORT_OFF);
        $this->dbConfig = $config->db();
        $this->db = $this->_createInstance();
    }

    public function connect(): void {
        if (!$this->db->ping()) {
            $this->db = $this->_createInstance();
        }
    }

    public function reconnect(): void {
        $this->disconnect();
        $this->db = $this->_createInstance();
    }

    public function disconnect(): void {
        if ($this->db->ping()) {
            $this->db->close();
        }
    }

    protected function _addquotes(array $fields): array {
        $result = [];
        foreach ($fields as $fieldName => $fieldValue) {
            $result["`{$fieldName}`"] = $fieldValue;
        }
        return $result;
    }

    private function _createInstance(): mysqli {
        return new mysqli($this->dbConfig['host'], $this->dbConfig['username'], $this->dbConfig['password'], $this->dbConfig['name']);
    }
}