<?php

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

