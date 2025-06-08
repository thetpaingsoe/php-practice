<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q11/Q11.php";

class Q11Test extends TestCase {
    public function testCalculateTotalCost() {
        $q11 = new Q11();

        $orders = [
            [ "country" =>"US", "item" => "Book", "quantity" => 7 ],
            [ "country" =>"CA", "item" => "Book", "quantity" => 2 ]
        ];

        $ruleString = "US:Book:1-3:5,US:Book:4-10:4,US:Pen:1-5:2,CA:Book:1-2:6,CA:Book:3-10:5";

        /*
        US -> Book -> 7 = 
            3 = 5 * 3 = 15
            4 = 4 * 4 = 16 
            total = 31
        CA -> Pen -> 2
            2 = 2 * 6= 12
            total = 12

        g-total = 31 + 12 = 43

        */
        $result = $q11->calculateTotalCost($ruleString, $orders);
        $this->assertEquals(43, $result);
    }
}