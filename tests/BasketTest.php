<?php

use App\Basket;
use App\DeliveryRules;
use App\Offers\BuyOneGetSecondHalfPriceOffer;
use App\Products\BlueWidget;
use App\Products\GreenWidget;
use App\Products\RedWidget;
use PHPUnit\Framework\TestCase;

class BasketTest extends TestCase
{
    public function testTotalCalculatedCorrectly(): void
    {
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


//        case 1
//        $basket
//            ->add('B01')
//            ->add('G01');
//        $this->assertEquals(37.85, $basket->total());

//        case 2
//        $basket
//            ->add('R01')
//            ->add('R01');
//        $this->assertEquals(54.37, $basket->total());

//        case 3
//        $basket
//            ->add('R01')
//            ->add('G01');
//        $this->assertEquals(60.85, $basket->total());

//        case 4
        $basket
            ->add('B01')
            ->add('B01')
            ->add('R01')
            ->add('R01')
            ->add('R01');
        $this->assertEquals(98.27, $basket->total());
    }
}
