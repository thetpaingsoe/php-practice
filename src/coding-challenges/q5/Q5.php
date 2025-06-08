<?php
/*
Part 3: Optimize for Lowest Cost Across Multiple Requests
    Now, you need to process multiple payment requests and return the total cost.
    You are given:
        The same routes as in Part 2 ( Q4.php )
        An array of requests, each with ['start', 'end']

🔍 Requirements:
    Implement calculateTotalCost(array $requests, array $routes): int
    Use the most efficient route per request (indirect allowed)
    If a request cannot be fulfilled, count its cost as 0 (or optionally skip)

🧪 Example Input:
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

✅ Output:
    31
*/
require_once __DIR__ . "/../q4/Q4.php";

class Q5 {
    public function calculateTotalCost(array $requests, array $routes): int 
    {
        $q4 = new Q4();
        $totalCost = 0;
        foreach($requests as $request) {
            if(count($request) != 2) continue;
            
            $start = $request[0];
            $end = $request[1];
            $cost = $q4->findMinimumCost($start, $end, $routes);
            $totalCost += $cost;
        }

        return $totalCost;

    }
}