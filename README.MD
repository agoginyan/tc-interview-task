# Acme Widget Co Sales System

## Overview

This is a basket for a sales system for Acme Widget Co. It provides a way to 
- initialize products catalogue with special offers and delivery rules
- add products from catalogue ro the basket
- calculates the total cost including delivery charges and special offers

## Features

- Manage product catalogue
- Apply delivery charges based on order total
- Apply special offers
- Calculate the final total cost

## Usage

1. **Initialize the Basket Class**

    ```php
    $offer = new BuyOneGetSecondHalfPriceOffer('R01');
    $deliveryRules = new DeliveryRules([
        [
            'order_price' => 0,
            'cost' => 4.95,
        ],
        [
            'order_price' => 50,
            'cost' => 2.95,
        ],
        [
            'order_price' => 90,
            'cost' => 0,
        ],
    ]);

    $products = [
        new RedWidget(),
        new GreenWidget(),
        new BlueWidget(),
    ];

    $basket = new Basket($products, [$offer], $deliveryRules);
    ```

2. **Add Products**

    ```php
    $basket->add('R01');
    $basket->add('G01');
    $basket->add('B01');
   
   // or
   
   $basket->add('R01')->add('G01')->add('B01');
    ```


3. **Get Total**

    ```php
    $basket->total();
    ```

## Assumptions

- Delivery rules are implemented without interfaces because they are assumed to always depend only on the order price.
- Offers are simplified for this proof of concept.


## Installation

Make sure you have PHP 8.2 or later.
Clone the repository, then run ```composer install```  and ```composer dump-autoload```.


## Tests

This repo contains simple PHPUnit test. To run it use ```./vendor/bin/phpunit tests```. You can play around by 
uncommenting different cases in ```tests/BasketTest.php```.

## License

This project is licensed under the MIT License.
