<?php
/*

Problem 1: Filter and Sort Transactions by Date
Input:
    transaction_type,currency,date,amount
    deposit,USD,2023-06-01,1000
    withdrawal,USD,2023-06-01,-200
    deposit,EUR,2023-06-02,500
    deposit,USD,2023-06-03,750
    withdrawal,EUR,2023-06-03,-100

Task:

    Write a function that takes:
        A CSV string like above
        A transaction_type (e.g. deposit)
        A date range (start and end date, inclusive)
    It should return:
        A list of filtered rows matching type and date range, sorted by date ascending
        Also return the total amount for the filtered rows

Output example:
    {
        "transactions": [
            ["deposit", "USD", "2023-06-01", 1000],
            ["deposit", "EUR", "2023-06-02", 500],
            ["deposit", "USD", "2023-06-03", 750]
        ],
        "total": 2250
    }

*/
class Q13 {

    private function formatReturnData($deposits, $total) {
        return json_encode([
            'transactions' => $deposits,
            'total' => $total
        ]);
    }
    private function sortDeposits($deposits) {
        usort($deposits, function($a, $b) {
            $dateA = strtotime($a[2]);
            $dateB = strtotime($b[2]);
            return $dateA <=> $dateB;
        });

        return $deposits;
    }

    private function explodeTransactionData($data) {
        $transactions = explode(',', $data);
        if(count($transactions) != 4) return [false, $transactions];

        return [true, $transactions];
    }

    private function processData($deposits, $total, $data) {
        $transactionType = $data[0];
        $amount = $data[3];

        if($transactionType == 'deposit') {
            $data[3] = (int) $amount; # Convert Amount From String to Int
            $deposits[] = $data;
            $total += $amount;
        }

        return [$total, $deposits];
    }
    
    public function getTransactions($csv) {

        $lines = explode(PHP_EOL, $csv);        
        $deposits = [];
        
        $total = 0;
        for($i = 1; $i<count($lines); $i++) {
        
            [$isDataValid, $transactions] = $this->explodeTransactionData($lines[$i]);

            if(!$isDataValid) continue;
            
            [$total, $deposits] = $this->processData($deposits, $total, $transactions);
            
        }

        $deposits = $this->sortDeposits($deposits);
        
        return $this->formatReturnData($deposits, $total);
        
       
    }
}