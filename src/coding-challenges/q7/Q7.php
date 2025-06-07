<?php
/*
🔍 Requirements:
    Write a function:
    function calculateTieredTotalPrice(array $products, array $priceMap): float

    Determine the total price for each product based on quantity and pricing tiers.
    Skip products not found in the price map.
    Return the total cost.

🧪 Example:
    $priceMap = [
        'apple' => [
            ['min' => 1, 'max' => 4, 'price' => 2.00],
            ['min' => 5, 'max' => 9, 'price' => 1.75],
            ['min' => 10, 'max' => null, 'price' => 1.50],
        ],
        'banana' => [
            ['min' => 1, 'max' => null, 'price' => 1.00]
        ]
    ];

    $products = [
        'apple' => 7,
        'banana' => 2,
        'orange' => 3 // not in priceMap, should be skipped
    ];

✅ Expected Output:
    (7 * 1.75) + (2 * 1.00) = 12.25 + 2.00 = 14.25

*/
class Q7 {
    public function calculateTieredTotalPrice(array $products, array $priceMap): float {

        $total = 0.0;
        foreach($products as $product => $qty) {
            if(isset($priceMap[$product])) {
                foreach($priceMap[$product] as $price) {
                    if($price['min'] <= $qty 
                        && ($price['max'] != null && $price['max'] >= $qty) ) {
                        $total += ($price['price'] * $qty);
                        
                        break;
                    }elseif($price['min'] <= $qty && $price['max'] == null) {
                        $total += ($price['price'] * $qty);
                        
                        break;
                    }
                }
            }
        }

        return $total;
    }
}