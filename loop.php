<?php
// Inicializa a variável
$soma = 0;
$numero =1;

// O loop do-while vai continuar até que a soma atinja ou ultrapasse 100
do {
  $soma += $numero; // Adiciona o valor de $numero à variável $soma
  echo "Adicionando $numero. Soma atual: $soma ";
  $numero++; // Incrementa $numero para próximo valor
} while ($soma < 100); // Condição para continuar o loop

echo "A soma final atingiu $soma, que é maior ou igual a 100!";
?>
