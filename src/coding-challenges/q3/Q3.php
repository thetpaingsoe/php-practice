<?php

/*
🔍 Requirements:
    Implement findMinimumCost(string $start, string $end, array $routes): int
    If no route exists, return -1.
    Routes are one-way (i.e., if A → B exists, B → A does not necessarily exist).
    There may be cycles (A → B → C → A), but never negative costs.

🧪 Example Input:
    $routes = [
        ['A', 'B', 5],
        ['B', 'C', 10],
        ['A', 'C', 100],
        ['C', 'D', 3]
    ];
    findMinimumCost('A', 'C', $routes); // should return 15 (A → B → C is cheaper than A → C directly)

✅ Expected Output:
    15

*/
class Q3 {

    private function findNextRoute(string $start, string $end, array $routes, &$calCost) {
        
        for($i = 0; $i < count($routes); $i++) {
            if($routes[$i][0] == $start) {
                # check the end
                if($routes[$i][1] == $end) {
                    $calCost += $routes[$i][2];
                    return $calCost;
                }else {
                    $calCost += $routes[$i][2];
                    $this->findNextRoute($routes[$i][1], $end, $routes, $calCost);
                }
            }
        }

    }

    public function findMinimumCost(string $start, string $end, array $routes): int {
        
        $minCost = -1;
        
        for($i = 0; $i < count($routes); $i++) {
            if($routes[$i][0] == $start) {

                # check the end
                if($routes[$i][1] == $end) {
                    if($minCost == -1 || $routes[$i][2] < $minCost) {
                        $minCost = $routes[$i][2];
                    }
                }else {

                    $calCost = $routes[$i][2];
                    $this->findNextRoute($routes[$i][1], $end, $routes, $calCost);

                    if(($minCost == -1 || $calCost < $minCost)) {
                        $minCost = $calCost;
                    }
                }
            }
        }
        return $minCost;
    }
}