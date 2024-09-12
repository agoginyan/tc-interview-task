<?php

namespace App;
use App\Interfaces\OfferInterface;
use App\Interfaces\ProductInterface;
use InvalidArgumentException;

class Basket
{
    /**
     * List of product codes added to the basket
     */
    protected array $items = [];

    /**
     * Catalogue of available product codes (indexes) with prices (values)
     */
    protected array $catalogue = [];

    /**
     * @param ProductInterface[] $products
     * @param OfferInterface[] $offers
     */
    public function __construct(
        public array $products,
        public array $offers,
        public DeliveryRules $deliveryRules,
    )
    {
        foreach ($this->products as $product) {
            $this->catalogue[$product->getCode()] = $product->getPrice();
        }
    }

    public function add(string $productCode): self
    {
        if (isset($this->catalogue[$productCode])) {
            $this->items[] = $productCode;
        } else {
            throw new InvalidArgumentException("Invalid product code: $productCode");
        }

        return $this;
    }

    public function total(): float
    {
        $totalPrice = 0.0;
        $discount = 0.0;
        $itemCounts = array_count_values($this->items);

        // Calculate total price without offers
        foreach ($itemCounts as $productCode => $count) {
            $totalPrice += $this->catalogue[$productCode] * $count;
        }

        // Apply offers if there are any
        // @todo improve offers logic to handle overlapping offers and other edge cases (need more info from business team)
        foreach ($this->offers as $offer) {
            $discount += $offer->calculateDiscount($this);
        }
        $totalPrice -= $discount;

        // Add delivery price
        $deliveryPrice = $this->deliveryRules->calculateDeliveryPrice($totalPrice);
        $totalPrice += $deliveryPrice;

        return floor($totalPrice * 100) / 100;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getCatalogue(): array
    {
        return $this->catalogue;
    }
}
