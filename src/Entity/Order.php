<?php

namespace Entity;

use Entity\Core\Request;
use Service\Core\Utils;
use Traits\Metadata;

class Order extends Core\BaseEntity {
    use Metadata;

    private int $userId;
    private \DateTime $orderDate;
    private float $totalPrice = 0.00;

    /** @var Product[]  */
    private array $products;

    public function __construct(array $order) {
        parent::__construct($order);

        $this->userId    = $order['userId'] ?? null;
        $this->orderDate = $order['orderDate'] ?? null;

        $orderProducts  = $order['products'] ?? [];
        $this->products = Product::createProducts($orderProducts);

        foreach ($this->products as $product) {
            $this->totalPrice += $product->totalPrice();
        }
    }

    public function userId() {
        return $this->userId;
    }

    public function orderDate() {
        return $this->orderDate;
    }

    public function totalPrice(): float {
        return $this->totalPrice;
    }

    /**
     * @return Product[]
     */
    public function products(): array {
        return $this->products;
    }

    public function createEntityFromRequest(Request $request): array {

    }

    public function __toString(): string {
        $orderProductNames = Utils::extractField($this->products, 'name');
        $result = [
            $this->id,
            $this->userId,
            $this->orderDate,
            $this->totalPrice,
            $orderProductNames,
        ];

        return json_encode($result, JSON_PRETTY_PRINT);
    }
}