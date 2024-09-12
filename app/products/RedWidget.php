<?php

namespace App\Products;

use App\Interfaces\ProductInterface;
use App\Traits\HasProductInterfaceTrait;

class RedWidget implements ProductInterface
{
    use HasProductInterfaceTrait;

    private string $name = 'Red Widget';

    private string $code = 'R01';

    private float $price = 32.95;
}
