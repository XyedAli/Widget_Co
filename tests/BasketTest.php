<?php

namespace Acme\Tests;

use Acme\Basket;
use Acme\Product;
use Acme\DeliveryChargeCalculator;
use Acme\OfferCalculator;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';

class BasketTest extends TestCase {

    public function testBasketTotalWithOffersAndDeliveryCharge() {

        echo 'Running test..........................' ;

        // Catalog of products
        $catalogue = [
            'R01' => new Product('R01', 'Red Widget', 32.95),
            'G01' => new Product('G01', 'Green Widget', 24.95),
            'B01' => new Product('B01', 'Blue Widget', 7.95),
        ];

        // Create a Basket instance
        $basket = new Basket($catalogue, new DeliveryChargeCalculator(), new OfferCalculator());

        // example first test case 
        $basket->add('B01');
        $basket->add('G01');


        // example Second test case 
        //  $basket->add('R01');
        //  $basket->add('R01');

        // example Third test case 
        // $basket->add('R01');
        // $basket->add('G01');
        

        // example fourth test case 
        //  $basket->add('B01');
        //  $basket->add('B01');
        //  $basket->add('R01');
        //  $basket->add('R01');
        //  $basket->add('R01');
      
        
        // This ensures the test will pass if the difference is within 0.01
        $this->assertEqualsWithDelta(98.27, $basket->total(), 0.01, 'The basket total does not match within the tolerance range.');
        // Allow up to 0.01 difference

     
    }
}

