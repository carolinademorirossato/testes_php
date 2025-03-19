<!DOCTYPE html>
<html>
<body>

<?php
class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
}

$myCar = new Car("red", "Volvo");
$myCar2 = new Car("grey", "BMW");

foreach ($myCar as $x => $y) {
  echo "$x: $y<br>";
}

foreach ($myCar2 as $a => $b) {
    echo "$a: $b<br>";
}
?>

</body>
</html>
