<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q10/Q10.php";

class Q10Test extends TestCase {
    public function testCalculateTotalCost() {
        $q10 = new Q10();

        $orders = [
            [ "country" =>"US", "item" => "Book", "quantity" => 3 ],
            [ "country" =>"CA", "item" => "Pen", "quantity" => 2 ]
        ];

        $ruleString = "US:Book:5,US:Pen:2,CA:Book:6,CA:Pen:3";
        $result = $q10->calculateTotalCost($ruleString, $orders);
        $this->assertEquals(21, $result);
    }
}