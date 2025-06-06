<?php

use PHPUnit\Framework\TestCase;


require_once __DIR__ . '../../../../src/coding-challenges/q2/q2.php';

class Q2Test extends TestCase {

    # Provide correct from and to and return the cost
    public function testCorrectFromTo() {
        $q2 = new Q2();
        $input = "UK:US:FedEx:4,UK:FR:Jet1:2,US:UK:RyanAir:8,CA:UK:CanadaAir:8";
        $result = $q2->getDirectShippingCost($input, "UK", "US");
        $this->assertEquals(4, $result);
    }

    # Provide not exists from and to and return null
    public function testCorrectFromTo_NoExists() {
        $q2 = new Q2();
        $input = "UK:US:FedEx:4,UK:FR:Jet1:2,US:UK:RyanAir:8,CA:UK:CanadaAir:8";
        $result = $q2->getDirectShippingCost($input, "TH", "SG");
        $this->assertEquals(null, $result);
    }

    # Provide Correct from and wrong to and return null
    public function testCorrectFromTo_OnlyFromCorrect() {
        $q2 = new Q2();
        $input = "UK:US:FedEx:4,UK:FR:Jet1:2,US:UK:RyanAir:8,CA:UK:CanadaAir:8";
        $result = $q2->getDirectShippingCost($input, "UK", "SG");
        $this->assertEquals(null, $result);
    }

    # Provide wrong from and correct to and return null
    public function testCorrectFromTo_OnlyToCorrect() {
        $q2 = new Q2();
        $input = "UK:US:FedEx:4,UK:FR:Jet1:2,US:UK:RyanAir:8,CA:UK:CanadaAir:8";
        $result = $q2->getDirectShippingCost($input, "SG", "US");
        $this->assertEquals(null, $result);
    }

    # Provide wrong format without comma
    public function testCorrectFromTo_WrongFormatComma() {
        $q2 = new Q2();
        $input = "UK:US:FedEx:4:UK:FR:Jet1:2:US:UK:RyanAir:8:CA:UK:CanadaAir:8";
        $result = $q2->getDirectShippingCost($input, "UK", "US");
        $this->assertEquals(null, $result);
    }

    # Provide wrong format incomple ship data
    public function testCorrectFromTo_WrongFormatInCompleteShipData() {
        $q2 = new Q2();
        $input = "UK:US:4:UK:FR:Jet1:2:US:UK:RyanAir:8:CA:UK:CanadaAir:8";
        $result = $q2->getDirectShippingCost($input, "UK", "US");
        $this->assertEquals(null, $result);
    }
}