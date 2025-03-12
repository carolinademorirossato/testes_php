<?php

define("PI", 3.14159);

$raio = 5;
$altura = 10;

$perimetro = 2 * PI * $raio;
$area = PI * pow($raio, 2);
$volume = PI * pow($raio, 2) * $altura;

$raizQuadrada = sqrt($area);
$numeroArredondado = round($volume, 2);

echo "Perímetro do círculo: " . $perimetro . "<br>";
echo "Área do círculo: " . $area . "<br>";
echo "Volume do cilindro: " . $volume . "<br>";
echo "Raiz quadrada da área: " . $raizQuadrada . "<br>";
echo "Volume arredondado: " . $numeroArredondado . "<br>";

?>