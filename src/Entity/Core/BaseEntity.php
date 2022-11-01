<?php

namespace Entity\Core;

abstract class BaseEntity {

    protected $id;

    public function __construct(array $entity) {
        $this->id = $entity['id'] ?? null;
    }

    public function id() {
        return $this->id;
    }

    abstract public function createEntityFromRequest(Request $request): array;
}