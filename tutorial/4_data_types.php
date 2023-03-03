<?php
$x = "5985";
var_dump($x);

$y = 5.6;
var_dump($y);

$z = true;
var_dump($z);

$cars = array("Volvo","BMW","Toyota", 66);
var_dump($cars);
echo $cars[3] . "\n";
?>

<?php
echo "<br>";

class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
    public function message() {
        return "My car is a " . $this->color . " " . $this->model . "!";
    }
}

$myCar = new Car("black", "Volvo");
echo $myCar -> message();
echo "<br>";
$myCar = new Car("red", "Toyota");
echo $myCar -> message();
?>