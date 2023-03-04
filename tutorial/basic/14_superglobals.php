<?php
// print_r($GLOBALS);
echo "<br>";
// print_r($_SERVER);
foreach($_SERVER as $x => $val) {
    echo "$x = $val<br>";
}
echo "<br>";
print_r($_REQUEST);
echo "<br>";
print_r($_POST);
echo "<br>";
print_r($_GET);
echo "<br>";
print_r($_FILES);
echo "<br>";
print_r($_ENV);
echo "<br>";
print_r($_COOKIE);
echo "<br>";
print_r($_SESSION);
echo "<br>";
