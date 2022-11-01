<?php

namespace Service\Core;

class Repository extends DB {

    public function addUser(array $values): void {
        $insertFieldNames = [];
        $insertFieldValues = [];
        foreach ($values as $fieldName => $fieldValue) {
            if ($fieldValue === null) {
                continue;
            }
            $insertFieldNames[]  = $fieldName;
            $insertFieldValues[] = "'{$fieldValue}'";
        }
        $queryFieldNames  = implode(', ', $insertFieldNames);
        $queryFieldValues = implode(', ', $insertFieldValues);
        $query = "INSERT INTO `users` ({$queryFieldNames}) VALUES ({$queryFieldValues})";
        $this->db->query($query);
    }

    public function updateUser(int $id, array $values): void {
        $fields = $this->_addquotes($values);
        $setValues = [];
        foreach ($fields as $fieldName => $fieldValue) {
            if ($fieldValue === null) {
                continue;
            }
            $setValues[] = "{$fieldName} = '{$fieldValue}'";
        }
        $querySetValues = implode(', ', $setValues);
        $this->db->query("UPDATE `users` SET {$querySetValues} WHERE `id` = {$id}");
    }

    public function deleteUserById(int $id): bool {
        return $this->db->query("DELETE FROM `users` WHERE `id` = {$id}");
    }

    public function loadAllUsers(): array {
        $result = $this->db->query('SELECT `id`, `name`, `email`, `phone`, `role` FROM `users`');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function loadUserByApiKey(?string $apiKey): ?array {
        $query = "SELECT `id`, `name`, `email`, `phone`, `role` FROM `users` WHERE `api_key` = '{$apiKey}'";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function loadRoleById(int $id): array {
        $result = $this->db->query("SELECT * FROM `list_roles` WHERE `id` = {$id}");
        return $result->fetch_assoc();
    }
}