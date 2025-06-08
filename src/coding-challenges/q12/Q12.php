<?php

class Q12 {
    public function findCheapestRoute($data, $source, $destination) : array {
        
        $finalRoute = "";
        $finalMethod = "";
        $cost = 0;

        $graph = [];
        if(! str_contains($data, ",")) return [];

        $routes = explode(",", $data);
        $allPlaces = [];
        foreach($routes as $route) {
            if(! str_contains($route, ":")) continue;

            $routeData = explode(":", $route);

            if(count($routeData) != 4) continue;

            $graph[$routeData[0]][$routeData[1]]['method'] = $routeData[2];
            $graph[$routeData[0]][$routeData[1]]['cost'] = $routeData[3];

            if(! in_array($routeData[0], $allPlaces) ) {
                $allPlaces[] = $routeData[0];
            }

            if(! in_array($routeData[1], $allPlaces) ) {
                $allPlaces[] = $routeData[1];
            }
        }
        
        $totalCost = [];
        $prevs = [];
        $method = [];
        $queue = new SplPriorityQueue();


        foreach($allPlaces as $place) {
            $totalCost[$place] = INF;
            $prevs[$place] = null;
            $method[$place] = null;
            $queue->insert($place, INF);
        }

        $totalCost[$source] = 0;
        $queue->insert($source, 0); 
        $isVisited = [];

        while(! $queue->isEmpty()) {
            $current = $queue->extract();

            if(isset($isVisited[$current])) continue;
            $isVisited[$current] = true;

            foreach($graph[$current] as $city => $next) {
                $cost = $totalCost[$current] + $next['cost'];

                if($totalCost[$city] > $cost) {
                    $totalCost[$city] = $cost;
                    $prevs[$city]= $current;
                    $method[$city] = $next['method'];
                    $queue->insert($city, -$cost);
                }
            }

        }

        $path = [];
        $methodNames = [];
        $current = $destination;
        
        while($current != null) {
            array_unshift($path, $current);
            array_unshift($methodNames, $method[$current]);
            $current = $prevs[$current];  
            
        }

        foreach($path as $p) {
            if($finalRoute == "") {
                $finalRoute .= $p;
            }else {
                $finalRoute .= " -> " . $p;
            }            
        }

        foreach($methodNames as $m ) {
            if($finalMethod == "") {
                $finalMethod .= $m;
            }else {
                $finalMethod .= " -> " . $m;
            }
        }

        $cost = $totalCost[$destination];

        $routeData = [
            "route" => $finalRoute,
            "method"=> $finalMethod,
            "cost" => $cost
        ];
        return $routeData;
    }
}