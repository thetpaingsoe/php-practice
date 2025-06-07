
<?php

# 🧩 Problem Statement
# You are given an array of intervals, where each interval is represented as a pair of integers [start, end]. Your task is to merge all overlapping intervals and return an array of the merged intervals.

# ✅ Function Signature
# def merge_intervals(intervals: List[List[int]]) -> List[List[int]]:

# 🧪 Example
# Input: [[1, 3], [2, 6], [8, 10], [15, 18]]
# Output: [[1, 6], [8, 10], [15, 18]]

# Input: [[1, 4], [4, 5]]
# Output: [[1, 5]]

# $input = [[1, 10], [2, 3], [4, 5]];
# $output = [[1, 10]];


class Q1 {
    public function mergeIntervals($intervals) {

        $merged = [];
        $current = [];
        $prev = [];
        foreach($intervals as $interval) {
            if(empty($current)) {
                $current = $interval;
            }else {
                if($current[1] < $interval[0]) { 
                    $current[1] = $prev[1];
                    $merged[] = $current;

                    $current = $interval;
                    $prev = $current;
                }else {
                    $prev = $interval;
                }
            }
        }
        if($prev[1] > $current[1]){
            $current[1] = $prev[1];
        }
        $merged[] = $current;
        return $merged;

    }

}
