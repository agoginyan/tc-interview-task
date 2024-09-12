<?php

namespace App\Products;

use App\Interfaces\ProductInterface;
use App\Traits\HasProductInterfaceTrait;

class GreenWidget implements ProductInterface
{
    use HasProductInterfaceTrait;

    private string $name = 'Green Widget';

    private string $code = 'G01';

    private float $price = 24.95;
}
