<?php
/*
🔍 Requirements:
    Implement findMinimumCost(string $start, string $end, array $routes): int
    If no route exists, return -1.
    Routes are one-way (i.e., if A → B exists, B → A does not necessarily exist).
    There may be cycles (A → B → C → A), but never negative costs.

🧪 Example Input:
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
    findMinimumCost('A', 'E', $routes); // should return 11

✅ Expected Output:
    11

*/
class Q4 {
    public function findMinimumCost(string $start, string $end, array $routes): int {

        $graph = [];
        foreach($routes as $route) {
            $graph[$route[0]][$route[1]] = $route[2];
            // $graph[$route[1]][$route[0]] = $route[2]; // If need bidirectional 
        }
        
        $queue = new SplPriorityQueue();
        $costs = [];
        $prevs = [];
        
        foreach($routes as $route) {

            $sRoute = $route[0];
            $eRoute = $route[1];
            if(! in_array($sRoute, $costs)) {
                $costs[$sRoute] = INF;
                $prevs[$sRoute] = null;
                $queue->insert($sRoute, INF);
            }
            
            if(! in_array($eRoute, $costs)) {
                $costs[$eRoute] = INF;
                $prevs[$eRoute] = null;
                $queue->insert($eRoute, INF);
            }
            
        }

        $queue->insert($start,0);
        $costs[$start] = 0;

        $visited = [];

        while(!$queue->isEmpty()) {
            $current = $queue->extract();
            
            if($visited[$current]) continue;
            $visited[$current] = true;

            foreach($graph[$current] as $next => $cost) {
                $altCost = $costs[$current] + $cost;
                if($altCost < $costs[$next]) {
                    $costs[$next] = $altCost;
                    $prevs[$next] = $current;
                    $queue->insert($next, -$altCost);
                }
            }
        }

        return isset($costs[$end]) ? $costs[$end] : -1;
    }
}