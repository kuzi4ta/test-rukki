<?php

namespace Controller;

use Entity\Core\Config;
use Entity\Core\Request;
use Service\Core\Repository;

class BaseController {

    private const ROLE_ADMIN   = 1;
    private const ROLE_MANAGER = 2;
    private const ROLE_USER    = 3;

    protected array $role;
    protected Repository $repository;


    public function __construct(Request $request, Config $config) {
        $this->repository = new Repository($config);
        $this->repository->connect();

        $apiKey = $request->get('api_key');
        $user   = $this->repository->loadUserByApiKey($apiKey);

        if ($user === null) {
            throw new \Exception('Invalid api key');
        }

        $this->role = $this->repository->loadRoleById($user['role']);
    }

    public function isUserRoleAllowWrite(): bool {
        return $this->role['permissions'] === 'WRITE';
    }

    public function __destruct() {
        $this->repository->disconnect();
    }
}