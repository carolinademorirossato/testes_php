<?php

$numeros = [10, 15, 20, 25, 30, 35, 40, 45, 50];

$soma = 0;
$contador = count($numeros);

for ($i = 0; $i < $contador; $i++) {

   $soma += $numeros[$i];
   
   if ($numeros[$i] % 2 == 0) {
       echo "O número {$numeros[$i]} é par. ";
   } else {
       echo "O número {$numeros[$i]} é ímpar. 
   <br>";
   }
}

$media = $soma / $contador;

echo "<br><strong>Soma dos números:</strong> $soma<br>";
echo "<strong>Média dos números:</strong> $media<br>";
?>  