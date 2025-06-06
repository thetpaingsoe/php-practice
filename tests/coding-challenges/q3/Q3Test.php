<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "../../../../src/coding-challenges/q3/Q3.php";

class Q3Test extends TestCase {

    public function testFindMinimumCost() {
        $q3 = new Q3();

        $routes = [
            ['A', 'B', 5],
            ['B', 'C', 10],
            ['A', 'C', 100],
            ['C', 'D', 3]
        ];
        $result = $q3->findMinimumCost("A","C", $routes);

        $this->assertEquals(15, $result);
    }

    public function testFindMinimumCost_Redirect3TimeRoute() {
        $q3 = new Q3();

        $routes = [
            ['A', 'B', 5],
            ['B', 'C', 10],
            ['A', 'D', 100],
            ['C', 'D', 3]
        ];
        $result = $q3->findMinimumCost("A","D", $routes);

        $this->assertEquals(18, $result);
    }

}