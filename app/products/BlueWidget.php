<?php

namespace App\Products;

use App\Interfaces\ProductInterface;
use App\Traits\HasProductInterfaceTrait;

class BlueWidget implements ProductInterface
{
    use HasProductInterfaceTrait;

    private string $name = 'Blue Widget';

    private string $code = 'B01';

    private float $price = 7.95;
}
