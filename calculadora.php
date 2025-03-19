<?php

// Função para somar dois números
function somar($num1, $num2) {
    return $num1 + $num2;
}

// Função para subtrair dois números
function subtrair($num1, $num2) {
    return $num1 - $num2;
}

// Função para multiplicar dois números
function multiplicar($num1, $num2) {
    return $num1 * $num2;
}

// Função para dividir dois números
function dividir($num1, $num2) {
    if ($num2 == 0) {
        return "Erro: Divisão por zero não permitida.";
    }
    return $num1 / $num2;
}

// Função para verificar se um número é par ou ímpar
function verificarParOuImpar($numero){
    if ($numero % 2 == 0) {
        return "$numero é par.";
    } else {
        return "$numero é ímpar.";
    }
}

// Testando as funções
echo "Soma: " . somar(10, 5) . "<br>";
echo "Subtração: " . subtrair(10, 5) . "<br>";
echo "Multiplicação: " . multiplicar(10, 5) . "<br>";
echo "Divisão: " . dividir(10, 5) . "<br>";
echo "Divisão por zero: " . dividir(10, 0) . "<br>";
echo verificarParOuImpar(10) . "<br>";
echo verificarParOuImpar(7) . "<br>";

?>

