<?php
$txt = "W3Schools.com";
echo "I love $txt!\n";
echo "I love " . $txt . "!\n";
?>

<?php
$x = 5; // global scope

function f1()
{
    // using x inside this function will generate an error
    // echo "<p>Variable x inside function is: $x</p>";
}

function f2() {
    $x = 10;
    echo "<p>Variable x inside function is: $x</p>";
}

f1();
f2();

echo "<p>Variable x outside function is: $x</p>";
?>