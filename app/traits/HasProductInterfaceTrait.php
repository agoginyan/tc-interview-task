<?php

namespace App\Traits;

trait HasProductInterfaceTrait
{
    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
