<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../src/coding-challenges/q1/Q1.php';

class Q1Test extends TestCase
{
    # Input: [[1, 3], [2, 6], [8, 10], [15, 18]]
    # Output: [[1, 6], [8, 10], [15, 18]]
    public function testCase1(): void
    {
        $q1 = new Q1();
        $input = [[1, 3], [2, 6], [8, 10], [15, 18]];
        $output = [[1, 6], [8, 10], [15, 18]];
        $result = $q1->mergeIntervals($input);
        $this->assertEquals($output, $result);
    }

    # Input: [[1, 4], [4, 5]]
    # Output: [[1, 5]]
    public function testCase2(): void
    {
        $q1 = new Q1();
        $input = [[1, 4], [4, 5]];
        $output = [[1, 5]];

        $result = $q1->mergeIntervals($input);
        $this->assertEquals($output, $result);
    }

    # [[1, 10], [2, 3], [4, 5]]
    # [[1, 10]]
    public function testCase3(): void
    {
        $q1 = new Q1();
        $input = [[1, 10], [2, 3], [4, 5]];
        $output = [[1, 10]];

        $result = $q1->mergeIntervals($input);
        $this->assertEquals($output, $result);
    }

}