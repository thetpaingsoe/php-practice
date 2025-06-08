<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q5/Q5.php";

class Q5Test extends TestCase {
    public function testCalculateTotalCost() {

        $routes = [
            ['A', 'B', 5],
            ['B', 'C', 10],
            ['C', 'D', 3],
            ['A', 'D', 50]
        ];

        $requests = [
            ['A', 'D'], // A → B → C → D = 18
            ['B', 'D'], // B → C → D = 13
            ['C', 'A']  // no path, cost = 0
        ];

        $q5 = new Q5();
        $result = $q5->calculateTotalCost($requests, $routes);

        $this->assertEquals(31, $result);
    }
}
