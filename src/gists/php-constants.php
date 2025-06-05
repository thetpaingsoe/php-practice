<?php
namespace gists;

trait TraitA {
    public function getTradeName() {
        return __TRAIT__;
    }
}

define("PORT", 8889);

class Network {

    use TraitA;

    const PORT2 = 8000;
    
    public function getPort1() {        
        return PORT;
    }

    public function getPort2() {
        return self::PORT2;
    }

    public function getClassName() {
        return __CLASS__;
    }

    public function getFunctionName() {
        return __FUNCTION__;
    }

    public function getMethodName() {
        return __METHOD__;
    }
}

$network = new Network();
echo "Port 1 : " . $network->getPort1() . "\n";
echo "Port 2 : " . $network->getPort2() . "\n";
echo "Port 2 : " . Network::PORT2 . "\n";

echo $network->getClassName() . "\n";
echo $network->getFunctionName() . "\n";
echo $network->getMethodName() . "\n";
echo $network->getTradeName() . "\n";

echo "DIR : " . __DIR__ . "\n";
echo "FILE : " . __FILE__ . "\n";
echo "LINE : " . __LINE__ . "\n";
echo "NS : " . __NAMESPACE__ . "\n";





