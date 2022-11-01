<?php

namespace Entity;

use Entity\Core;
use Traits\Metadata;

class Product extends Core\BaseEntity {
    use Metadata;

    private string $name;
    private float $price;
    private int $count;

    public function __construct(array $product) {
        parent::__construct($product);

        $this->name  = $product['name'] ?? null;
        $this->price = $product['price'] ?? null;
        $this->count = $product['count'] ?? null;
    }

    public function name(): string {
        return $this->name;
    }

    public function price(): float {
        return $this->price;
    }

    public function count(): int {
        return $this->count;
    }

    public function totalPrice(): float {
        return $this->price * $this->count;
    }

    /**
     * @param array $products
     * @return Product[]
     */
    public static function createProducts(array $products): array {
        $productEntities = [];
        foreach ($products as $product) {
            $productEntities[] = new self($product);
        }
        return $productEntities;
    }

    public function createEntityFromRequest(Core\Request $request): array {

    }

    public function __toString(): string {
        $result = [
            $this->id,
            $this->name,
            $this->price,
            $this->count,
        ];

        return json_encode($result, JSON_PRETTY_PRINT);
    }
}