<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q12/Q12.php";

class Q12Test extends TestCase {
    public function testFindCheapestRoute() {
        $q12 = new Q12();

        $data = "US:UK:Delta:1,UK:FR:EasyJet:3,FR:DE:Lufthansa:4,US:DE:United:10";
        $source = "US";
        $destination = "DE";
        $result = $q12->findCheapestRoute($data, $source, $destination);

        $expected = [
            "route" => "US -> UK -> FR -> DE",
            "method"=> "Delta -> EasyJet -> Lufthansa",
            "cost" => 8
        ];

        $this->assertEquals($expected, $result);
    }
}