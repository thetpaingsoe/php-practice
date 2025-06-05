<?php

echo pi() . "\n";

// Min & Max from Array
$arr = array(23,40,2,352,-23,-2);

echo "Min " . min($arr) . "\n";
echo "Max " . max($arr) . "\n";

# absolute (Positive Value)
$val = -232.23;
echo "Abs " . abs($val) . "\n";

# Sqrt
$val = 4;
echo "Sqrt " . sqrt($val) . "\n";

# Round
$val1 = 0.50;
$val2 = 0.49;
echo "Round : " . round($val1) . "\n";
echo "Round : " . round($val2) . "\n";

# Random
echo "Random  : " . rand(0,10) . "\n";