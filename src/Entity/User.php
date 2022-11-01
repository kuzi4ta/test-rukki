<?php

namespace Entity;

use Entity\Core\Request;
use Traits\Metadata;

class User extends Core\BaseEntity {
    use Metadata;

    private ?string $name;
    private ?string $email;
    private ?string $phone;
    private ?string $password;
    private ?string $apiKey;

    public function __construct(array $user) {
        parent::__construct($user);

        $this->name     = $user['name'] ?? null;
        $this->email    = $user['email'] ?? null;
        $this->phone    = $user['phone'] ?? null;
        $this->password = $user['password'] ?? null;
        $this->apiKey   = $user['api_key'] ?? null;
    }

    public function name() {
        return $this->name;
    }

    public function email() {
        return $this->email;
    }

    public function phone() {
        return $this->phone;
    }

    public function password() {
        return $this->password;
    }

    public function apiKey() {
        return $this->apiKey;
    }

    public function createEntityFromRequest(Request $request): array {

    }

    public function __toString(): string {
        $result = [
            $this->id,
            $this->name,
            $this->email,
            $this->phone,
            $this->apiKey,
        ];

        return json_encode($result, JSON_PRETTY_PRINT);
    }
}