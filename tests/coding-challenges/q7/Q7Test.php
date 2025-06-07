<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q7/Q7.php";

class Q7Test extends TestCase{
    public function testCalculateTieredTotalPrice() {
        $q7 = new Q7();

        $priceMap = [
            'apple' => [
                ['min' => 1, 'max' => 4, 'price' => 2.00],
                ['min' => 5, 'max' => 9, 'price' => 1.75],
                ['min' => 10, 'max' => null, 'price' => 1.50],
            ],
            'banana' => [
                ['min' => 1, 'max' => null, 'price' => 1.00]
            ]
        ];

        $products = [
            'apple' => 7,
            'banana' => 2,
            'orange' => 3 // not in priceMap, should be skipped
        ];
        $total = $q7->calculateTieredTotalPrice($products, $priceMap);

        $this->assertEquals(14.25, $total);
    }
}