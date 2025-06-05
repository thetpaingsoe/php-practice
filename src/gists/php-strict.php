<?PHP declare(strict_types=1);

function sum(float $num1, float $num2) : int {
    // return num1 + num2; // This will not work
    return (int) ( $num1 + $num2 );
}

echo sum(23.33, 24.25) . "\n";