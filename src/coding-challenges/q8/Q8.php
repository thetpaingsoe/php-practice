<?php
/*

🔍 Requirements:
    Volume-Based Tiered Pricing (Split Quantities Across Tiers)
    Unlike Part 2 (where the entire quantity used the matched tier’s price), in Part 3, quantities are split across tiers.

    This means:
        The first N units are charged at Tier 1 price.
        The next M units at Tier 2 price, and so on.
        This models true tiered pricing, also known as graduated pricing or step pricing.

    Write a function:
        function calculateGraduatedTotalPrice(array $products, array $priceMap): float
    
    Each tier has min, max, and price.  
    You split the quantity across applicable tiers.
    Skip products not in the price map.

🧪 Example:
    $priceMap = [
        'apple' => [
            ['min' => 1, 'max' => 4, 'price' => 2.00],     // First 4 apples
            ['min' => 5, 'max' => 9, 'price' => 1.75],     // Next 5 apples (5–9)
            ['min' => 10, 'max' => null, 'price' => 1.50], // 10+
        ],
        'banana' => [
            ['min' => 1, 'max' => null, 'price' => 1.00]
        ]
    ];

    $products = [
        'apple' => 11,
        'banana' => 2,
    ];

✅ Expected Breakdown:
    Apple:
        1–4 → 4 × 2.00 = 8.00
        5–9 → 5 × 1.75 = 8.75
        10–11 → 2 × 1.50 = 3.00 
        = Total for apple: 19.75
    Banana:
        2 × 1.00 = 2.00
    → Final total: 21.75
*/

class Q8 {
    public function calculateGraduatedTotalPrice(array $products, array $priceMap): float 
    {
        $totalPrice = 0;
        foreach($products as $name => $qty) {
            foreach($priceMap as $prdName => $priceSets) {
                if($name == $prdName) {
                    
                    foreach($priceSets as $priceSet) {
                        $calQty = 0.0;
                        
                        if($priceSet['max'] == null ){                            
                            $calQty = $qty - $priceSet['min'] + 1;                            
                        }else if($priceSet['max'] <= $qty) {
                            $calQty = $priceSet['max'] - $priceSet['min'] + 1;                            
                        }
                        $totalPrice += ($calQty * $priceSet['price']);                        
                    }
                }
            }
        }
        return $totalPrice;
    }

}