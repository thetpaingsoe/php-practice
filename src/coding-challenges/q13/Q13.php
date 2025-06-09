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
    public function getTransactions($csv) {

        $lines = explode(PHP_EOL, $csv);        
        $deposits = [];
        
        $total = 0;
        for($i = 1; $i<count($lines); $i++) {
        
            $transactions = explode(',', $lines[$i]);
            if(count($transactions) != 4) continue;
            if($transactions[0] == 'deposit') {
                $transactions[3] = (int) $transactions[3];
                $deposits[] = $transactions;
                $total += $transactions[3];
            }
        }

        usort($deposits, function($a, $b) {
            $dateA = strtotime($a[2]);
            $dateB = strtotime($b[2]);
            return $dateA <=> $dateB;
        });
        
        $data = [
            'transactions' => $deposits,
            'total' => $total
        ];

        return json_encode($data);
       
    }
}