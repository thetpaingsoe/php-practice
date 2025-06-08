<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q8/Q8.php";

class Q8Test extends TestCase {
    public function testCalculateGraduatedTotalPrice() {
        $q8 = new Q8();

        $priceMap = [
            'apple' => [
                ['min' => 1, 'max' => 4, 'price' => 2.00],     // First 4 apples
                ['min' => 5, 'max' => 9, 'price' => 1.75],     // Next 5 apples (5–9)
                ['min' => 10, 'max' => null, 'price' => 1.50], // 10+
            ],
            'banana' => [
                ['min' => 1, 'max' => null, 'price' => 1.00]
            ]
        ];

        $products = [
            'apple' => 11,
            'banana' => 2,
        ];
        $result = $q8->calculateGraduatedTotalPrice($products, $priceMap);
        $this->assertEquals(21.75, $result);
    }
}