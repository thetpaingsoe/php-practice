<?php

/*
🔍 Problem Title: Shipping Cost Calculator 
    You are given a string representing shipping data in this format:
        "UK:US:FedEx:4,UK:FR:Jet1:2,US:UK:RyanAir:8,CA:UK:CanadaAir:8"
    Each record represents a direct flight:
        <Source>:<Destination>:<Carrier>:<Cost>
    Write a function:
        function getDirectShippingCost(string $data, string $from, string $to): ?int

    The function should return the shipping cost between $from and $to if a direct route exists.
    Return null if no direct route exists.
    Assume the input string is always well-formed.

🔸 Example
    $data = "UK:US:FedEx:4,UK:FR:Jet1:2,US:UK:RyanAir:8,CA:UK:CanadaAir:8";
    getDirectShippingCost($data, "UK", "FR"); // 2
    getDirectShippingCost($data, "US", "FR"); // null
 */
class Q2 {
    public function getDirectShippingCost(string $data, string $from, string $to): ?int {
        
        # Make sure it contain the ","
        if(! str_contains($data, ",")) {
            return null;
        }

        $encodedData = explode(",", $data);
        
        for($i = 0; $i < count($encodedData); $i++) {

            # Make sure it contain ":"
            # and It has data length of 4
            if(! str_contains($encodedData[$i], ":")){ 
                continue;
            }

            $shipData = explode(":", $encodedData[$i]);

            if(count($shipData) != 4) {
                continue;
            }

            if($shipData[0] == $from && $shipData[1] == $to) {
                return $shipData[3];
            }
        }

        return null;
    }

}

