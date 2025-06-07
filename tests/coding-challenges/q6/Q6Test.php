<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q6/Q6.php";

class Q6Test extends TestCase {
    public function testCalculateTotalPrice() {
        $q6 = new Q6();
        $products = ["apple", "banana", "apple", "orange"];
        $priceMap = [
            "apple" => 1.2,
            "banana" => 0.5,
            "orange" => 0.8
        ];
        $total = $q6->calculateTotalPrice($products, $priceMap);
        $this->assertEquals(3.7, $total);
    }
}