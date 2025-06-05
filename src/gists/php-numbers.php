<?php

// Integers
echo PHP_INT_MAX . "\n";
echo PHP_INT_MIN . "\n";
echo PHP_INT_SIZE . "\n";

$val = 8;
var_dump(is_int($val));

// Floats
echo PHP_FLOAT_MAX . "\n";
echo PHP_FLOAT_MIN . "\n";
echo PHP_FLOAT_DIG . "\n";
echo PHP_FLOAT_EPSILON . "\n";

$val = 8.232;
var_dump(is_float($val));

# NaN
$x = acos(8);
var_dump($x);

# Numeric
$x = "Hello";
var_dump(is_numeric($x));

# Cast
$x = 23.2322;
echo (int)$x . "\n";
