<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../../src/coding-challenges/q13/Q13.php";

class Q13Test extends TestCase {
    public function testGetTrasactions() {
        $q13 = new Q13();
        
        $data = <<<EOL
            transaction_type,currency,date,amount
            deposit,USD,2023-06-01,1000
            withdrawal,USD,2023-06-01,-200
            deposit,EUR,2023-06-02,500
            deposit,USD,2023-06-03,750
            withdrawal,EUR,2023-06-03,-100
            EOL;

        $result = $q13->getTransactions($data);

        $expected = <<<EOL
{"transactions":[["deposit","USD","2023-06-01",1000],["deposit","EUR","2023-06-02",500],["deposit","USD","2023-06-03",750]],"total":2250}
EOL;
        $this->assertEquals($expected, $result);
    }

    # Blank
    public function testGetTrasactions_blank() {
        $q13 = new Q13();
        
        $data = "";

        $result = $q13->getTransactions($data);

        $expected = <<<EOL
{"transactions":[],"total":0}
EOL;
        $this->assertEquals($expected, $result);
    }

    # Only Header
    public function testGetTrasactions_onlyHeader() {
        $q13 = new Q13();
        
        $data = <<<EOL
            transaction_type,currency,date,amount            
            EOL;

        $result = $q13->getTransactions($data);

        $expected = <<<EOL
{"transactions":[],"total":0}
EOL;
        $this->assertEquals($expected, $result);
    }

    # No deposit
    public function testGetTrasactions_noDeposit() {
        $q13 = new Q13();
        
        $data = <<<EOL
            transaction_type,currency,date,amount
            withdrawal,USD,2023-06-01,-200
            withdrawal,EUR,2023-06-03,-100
            EOL;

        $result = $q13->getTransactions($data);

        $expected = <<<EOL
{"transactions":[],"total":0}
EOL;
        $this->assertEquals($expected, $result);
    }

    # Not complete data ( like deposit,2023-06-01,1000)
    public function testGetTrasactions_IncompleteData() {
        $q13 = new Q13();
        
        $data = <<<EOL
            transaction_type,currency,date,amount
            deposit,USD,2023-06-01,1000
            withdrawal,USD,2023-06-01,-200
            deposit,EUR,2023-06-02,500
            deposit,2023-06-03,750
            withdrawal,EUR,2023-06-03,-100
            EOL;

        $result = $q13->getTransactions($data);

        $expected = <<<EOL
{"transactions":[["deposit","USD","2023-06-01",1000],["deposit","EUR","2023-06-02",500]],"total":1500}
EOL;
        $this->assertEquals($expected, $result);
    }

}