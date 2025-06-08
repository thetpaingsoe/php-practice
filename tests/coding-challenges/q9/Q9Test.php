<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q9/Q9.php";

class Q9Test extends TestCase {
    public function testCalculateLowestPrice() {
        $products = [
            'apple' => 11,
            'banana' => 2,
        ];

        $pricingModels = [
            'standard' => [
                'apple' => [
                    ['min' => 1, 'max' => 4, 'price' => 2.00],
                    ['min' => 5, 'max' => 9, 'price' => 1.75],
                    ['min' => 10, 'max' => null, 'price' => 1.50],
                ],
                'banana' => [
                    ['min' => 1, 'max' => null, 'price' => 1.00]
                ],
            ],
            'promo' => [
                'apple' => [
                    ['min' => 1, 'max' => 9, 'price' => 1.60],
                    ['min' => 10, 'max' => null, 'price' => 1.20],
                ],
                'banana' => [
                    ['min' => 1, 'max' => null, 'price' => 0.90]
                ],
            ]
        ];

        $q9 = new Q9();
        $result = $q9->calculateLowestPrice($products, $pricingModels);
        $this->assertEquals(18.60, $result);

    }
}