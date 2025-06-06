<?php

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