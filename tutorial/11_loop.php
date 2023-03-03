<?php
// while
$x = 1;

while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
}


// do while
$x = 1;

do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);


// for loop
for ($x = 0; $x <= 100; $x+=10) {
    echo "The number is: $x <br>";
}

// for each
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$value <br>";
}

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($age as $x => $val) {
  echo "$x = $val<br>";
}
echo $age["Peter"];
?>