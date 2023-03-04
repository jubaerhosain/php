<?php declare(strict_types=1); // strict requirement

function addNumbers(int $a, int $b) {
  return $a + $b;
}
echo addNumbers(5, 5);
// since strict is enabled and "5 days" is not an integer, an error will be thrown


function addNumbers1(float $a, float $b) : float {
    return $a + $b;
}
echo addNumbers1(1.2, 5.2);

function add_five(&$value) {
    $value += 5;
}
  
$num = 2;
add_five($num);
echo $num;
