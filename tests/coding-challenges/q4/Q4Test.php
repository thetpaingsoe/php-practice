<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "../../../../src/coding-challenges/q4/Q4.php";

class Q4Test extends TestCase {
    public function testfindMinimumCost() {
        $q = new Q4();
        $routes = [
            ['A', 'B', 5],
            ['B', 'C', 10],
            ['A', 'D', 100],
            ['C', 'D', 3]
        ];

        $result = $q->findMinimumCost("A", "D", $routes);
        $this->assertEquals(18, $result);
    }

    public function testfindMinimumCost_withTwoPossibleRoute() {
        $q = new Q4();
        
        $routes = [
            ['A', 'B', 1 ],
            ['B', 'C', 10 ],
            ['C', 'E', 10 ],
            ['A', 'C', 1 ],
            ['C', 'B', 1 ],
            ['B', 'D', 1 ],
            ['D', 'F', 1 ],
            ['F', 'E', 40 ]            
        ];

        $result = $q->findMinimumCost("A", "E", $routes);
        $this->assertEquals(11, $result);
    }

    public function testfindMinimumCost_withInitialRoute() {
        $q = new Q4();
        
        $routes = [
            ['A', 'B', 1 ],
            ['B', 'C', 10 ],
            ['C', 'E', 10 ],
            ['A', 'C', 1 ],
            ['C', 'B', 1 ],
            ['B', 'D', 1 ],
            ['D', 'F', 1 ],
            ['F', 'E', 40 ]            
        ];

        $result = $q->findMinimumCost("A", "A", $routes);
        $this->assertEquals(0, $result);
    }

    public function testfindMinimumCost_withInvalidEndRoute() {
        $q = new Q4();
        
        $routes = [
            ['A', 'B', 1 ],
            ['B', 'C', 10 ],
            ['C', 'E', 10 ],
            ['A', 'C', 1 ],
            ['C', 'B', 1 ],
            ['B', 'D', 1 ],
            ['D', 'F', 1 ],
            ['F', 'E', 40 ]            
        ];

        $result = $q->findMinimumCost("A", "G", $routes);
        $this->assertEquals(-1, $result);
    }
}