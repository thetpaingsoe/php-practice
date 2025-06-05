<?php

define("PORT", 8889);

class Network {

    const PORT2 = 8000;
    
    public function getPort1() {        
        return PORT;
    }

    public function getPort2() {
        return self::PORT2;
    }
}

$network = new Network();
echo "Port 1 : " . $network->getPort1() . "\n";
echo "Port 2 : " . $network->getPort2() . "\n";
echo "Port 2 : " . Network::PORT2 . "\n";