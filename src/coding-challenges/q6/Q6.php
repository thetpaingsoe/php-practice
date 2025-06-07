<?php

/*

🔍 Product Price Calculator (Basic)
    You are given:
    An array of product names (strings).
    A pricing map where the key is the product name and the value is the price (float or int).
    Write a function that calculates the total price for the list of products.

➕ Example Input:
    $products = ["apple", "banana", "apple", "orange"];
    $priceMap = [
        "apple" => 1.2,
        "banana" => 0.5,
        "orange" => 0.8
    ];
✅ Output:
    3.7 // (1.2 + 0.5 + 1.2 + 0.8)

*/
class Q6 {
    public function calculateTotalPrice(array $products, array $priceMap): float {

        $total = 0.0;
        foreach($products as $product) {
            if(isset($priceMap[$product])) {
                $total += $priceMap[$product];
            }
        }

        return $total;
    }
}