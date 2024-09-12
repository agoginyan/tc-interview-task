<?php

namespace App\Offers;

use App\Basket;
use App\Interfaces\OfferInterface;

class BuyOneGetSecondHalfPriceOffer implements OfferInterface
{
    public function __construct(
        public string $productCode,
    ) {}

    public function calculateDiscount(Basket $basket): float
    {
        $itemCounts = array_count_values($basket->getItems());
        // get the count of products in the basket to which we should apply this offer
        $count = $itemCounts[$this->productCode] ?? 0;
        // if there are less than 2 products of a type in the basket then user will not get any discount
        if ($count < 2) {
            return 0.0;
        }
        // discount is sum of half prices of each second product
        return $basket->getCatalogue()[$this->productCode] * floor($count / 2) / 2;
    }
}
