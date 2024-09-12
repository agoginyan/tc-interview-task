<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function getName(): string;

    public function getCode(): string;

    public function getPrice(): float;
}
