<?php

class Q9 {
    public function calculateLowestPrice(array $products, array $pricingModels): float
    {
        $total = 0.0;

        foreach($products as $name => $qty) {

            $productBasedMininumCost = 0.0;
            foreach($pricingModels as $modeName => $modelPricings) {
                $modelBasedTotalCost = 0.0;
                
                foreach($modelPricings as $prdName => $priceMaps) {
                    
                    if($name != $prdName) continue;

                    foreach($priceMaps as $priceMap) {
                        
                        if($priceMap['max'] == null) {
                            $calQty = $qty - $priceMap['min'] + 1;
                        }else if($priceMap['max'] < $qty) {
                            $calQty =  $priceMap['max'] - $priceMap['min'] + 1;
                        }
                        
                        $modelBasedTotalCost += ($calQty * $priceMap['price']);                        
                        
                    }
                }

                if($productBasedMininumCost == 0.0 || $productBasedMininumCost > $modelBasedTotalCost) {
                    $productBasedMininumCost = $modelBasedTotalCost;
                }
            }

            if($total == 0.0 || $total > $productBasedMininumCost) {
                $total += $modelBasedTotalCost;
            }

        }
        return $total;
    }
}