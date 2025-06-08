<?php

class Q11 {
    public function calculateTotalCost($rulesString, $orders) : int 
    {
        
        if(! str_contains($rulesString, ",")) return 0;

        $totalCost = 0;
        $dataSet = explode(",", $rulesString);
        $ruleSet = [];
        foreach($dataSet as $data) {

            if(! str_contains($data, ":")) continue;

            $productData = explode(":", $data);

            if(count($productData) != 4) continue;

            if(! str_contains($productData[2], "-")) continue;

            $range = explode("-", $productData[2]);

            if(count($range) != 2) continue;

            $price['min'] = $range[0];
            $price['max'] = $range[1];
            $price['price'] = $productData[3];
            $ruleSet[$productData[0]][$productData[1]][] = $price;

        }

        foreach($orders as $order) {
            if(count($order) != 3) continue;
            
            foreach($ruleSet[$order['country']][$order['item']] as $rule) {
                
                $calQty = 0;
                if($rule['max'] < $order['quantity']) {
                    $calQty = $rule['max'] - $rule['min'] + 1;
                }else {
                    $calQty = $order['quantity'] - $rule['min'] + 1;
                }

                // What if qty is over the range 
                // Since it is not cover yet, i ignore it for now.

                $totalCost += ($calQty * $rule['price']);
            }
        
        }

        return $totalCost;
    }
}