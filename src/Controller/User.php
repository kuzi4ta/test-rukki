<?php

namespace Controller;

use Entity;

class User extends BaseController {

    public function addUserAction(Entity\Core\Request $request): void {
        if (!$this->isUserRoleAllowWrite()) {
            throw new \Exception('Not enough rights');
        }

        $insertValues = [
            'name'     => $request->post('name'),
            'email'    => $request->post('email'),
            'phone'    => $request->post('phone'),
            'password' => $request->post('password'),
            'api_key'  => $request->get('api_key'),
            'role'     => $request->post('role'),
        ];

        $this->repository->addUser($insertValues);
    }

    public function updateUserAction(Entity\Core\Request $request): string {
        if (!$this->isUserRoleAllowWrite()) {
            throw new \Exception('Not enough rights');
        }

        $userId   = $request->post('id');

        $updateValues = [
            'name'     => $request->post('name'),
            'email'    => $request->post('email'),
            'phone'    => $request->post('phone'),
            'password' => $request->post('password'),
            'api_key'  => $request->get('api_key'),
            'role'     => $request->post('role'),
        ];

        $this->repository->updateUser($userId, $updateValues);
        return "Updated user with id {$userId}";
    }

    public function deleteUserAction(Entity\Core\Request $request): string {
        if (!$this->isUserRoleAllowWrite()) {
            throw new \Exception('Not enough rights');
        }
        $userId = $request->post('id');
        $isDeleted = $this->repository->deleteUserById($userId);
        return $isDeleted ? "Deleted user with id {$userId}" : "Failed to delete";
    }

    public function getUsersAction(Entity\Core\Request $request): array {
        return $this->repository->loadAllUsers();
    }
}