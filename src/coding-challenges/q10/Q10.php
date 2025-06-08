<?php

class Q10 {
    public function calculateTotalCost($rulesString, $orders) : int 
    {
        // $orders = [
        //     [ "country" =>"US", "item" => "Book", "quantity" => 3 ],
        //     [ "country" =>"CA", "item" => "Pen", "quantity" => 2 ]
        // ];

        // $ruleString = "US:Book:5,US:Pen:2,CA:Book:6,CA:Pen:3";

        if(! str_contains($rulesString, ",")) return 0;

        $totalCost = 0;
        $dataSet = explode(",", $rulesString);
        $ruleSet = [];
        foreach($dataSet as $data) {

            if(! str_contains($data, ":")) continue;

            $productData = explode(":", $data);

            if(count($productData) != 3) continue;

            $ruleSet[$productData[0]][$productData[1]] = $productData[2];
        }

        foreach($orders as $order) {
            if(count($order) != 3) continue;

            $totalCost += $ruleSet[$order['country']][$order['item']] * $order['quantity'];
        }

        return $totalCost;
    }
}