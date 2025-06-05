<?php

$sample = "This is the string.";

echo strlen($sample) . "\n";

echo str_word_count($sample) . "\n";

echo strpos($sample, "string") . "\n";

echo strtoupper($sample) . "\n";

echo strtolower($sample) . "\n";

echo str_replace("the", "a", $sample) . "\n";

echo strrev($sample) . "\n";

var_dump(explode(" ", $sample));

echo substr($sample, 8, 11) . "\n";
echo substr($sample, 8) . "\n";
echo substr($sample, -7, 6) . "\n";