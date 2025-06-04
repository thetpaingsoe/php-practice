<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/q1/Solution.php';

class SolutionTest extends TestCase
{
    # Input: [[1, 3], [2, 6], [8, 10], [15, 18]]
    # Output: [[1, 6], [8, 10], [15, 18]]
    public function testCase1(): void
    {
        $solution = new Solution();
        $input = [[1, 3], [2, 6], [8, 10], [15, 18]];
        $output = [[1, 6], [8, 10], [15, 18]];
        $result = $solution->mergeIntervals($input);
        $this->assertEquals($output, $result);
    }

    # Input: [[1, 4], [4, 5]]
    # Output: [[1, 5]]
    public function testCase2(): void
    {
        $solution = new Solution();
        $input = [[1, 4], [4, 5]];
        $output = [[1, 5]];

        $result = $solution->mergeIntervals($input);
        $this->assertEquals($output, $result);
    }

    # [[1, 10], [2, 3], [4, 5]]
    # [[1, 10]]
    public function testCase3(): void
    {
        $solution = new Solution();
        $input = [[1, 10], [2, 3], [4, 5]];
        $output = [[1, 10]];

        $result = $solution->mergeIntervals($input);
        $this->assertEquals($output, $result);
    }

}