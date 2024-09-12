<?php

namespace App\Interfaces;

use App\Basket;

interface OfferInterface
{
    public function calculateDiscount(Basket $basket): float;
}
