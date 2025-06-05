<?PHP

/* There are 3 types of array
- Indexed Arrays
- Associated Arrays
- Multidimensional Arrays
*/

// - Indexed Arrays
$cars = array("Volvo", "BMW", "Toyota");
echo $cars[0] . "\n";

// - Associated Arrays
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);

foreach ($car as $x => $y) {
  echo "$x: $y \n";
}

// - Multidimensional Arrays
$cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);
echo "\n" . $cars[0][0] . "\n";
foreach($cars as $car) {
    foreach($car as $k => $v) {
        echo "$k : $v \n";
    }
}

// Uset Array
$arr = ["A","B","C"];
var_dump($arr);
unset($arr);
if (isset($arr)) {
    var_dump($arr);
} else {
    echo "Variable \$arr is not set (or is null).\n";
}

# Add 
$arr = ["A","B","C"];
$arr[] = "D";
var_dump($arr);

array_push($arr, "E", "F");
var_dump($arr);

$arr = array_merge($arr, ["G","H","I"]);
var_dump($arr);

$dict = ["type1" => "val1", "type2" => "val2"];
$dict += ["type3" => "val3", "type4" => "val4"];
var_dump($dict);


# Remove
$arr = ["A","B","C","D"];
array_splice($arr, 1,2);
var_dump($arr);

unset($arr[1]);
var_dump($arr);

$arr = ["A","B","C","D"];
array_pop($arr); // remove last
var_dump($arr);

array_shift($arr); // remove first
var_dump($arr);

$dict = ["type1" => "val1", "type2" => "val2"];
unset($dict["type2"]);
var_dump($dict);

$dict = ["type1" => "val1", "type2" => "val2"];
$newDict = array_diff($dict, ["type2"=>"val2"]); // return the only diffs
var_dump($newDict);


/* 
Sort 
- sort() - sort arrays in ascending order
- rsort() - sort arrays in descending order
- asort() - sort associative arrays in ascending order, according to the value
- ksort() - sort associative arrays in ascending order, according to the key
- arsort() - sort associative arrays in descending order, according to the value
- krsort() - sort associative arrays in descending order, according to the key
*/

$cars = array("Volvo", "BMW", "Toyota");
sort($cars);
var_dump($cars);

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
asort($age);
var_dump($age);

// More functions 
// https://www.w3schools.com/php/php_arrays_functions.asp