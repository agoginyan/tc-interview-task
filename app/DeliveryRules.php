<?php

namespace App;

class DeliveryRules
{
    public function __construct(
        public array $rules,
    ) {}

    public function calculateDeliveryPrice($subtotal): float
    {
        $cost = 0.0;

        foreach ($this->rules as $rule) {
            if ($subtotal > $rule['order_price']) {
                $cost = $rule['cost'];
            } else {
                break;
            }
        }

        return $cost;
    }
}
