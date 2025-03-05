<?php
//insere a classe
include_once "produto.php";
// cria um objeto
$produto = new Produto;
// atribuir valores
$produto->codigo = 4001;
$produto->descricao = "CD - The Best of Eric Clapton";
// agora imprimimos as propriedades diretamente
echo "Código: " . $produto->codigo . " - Descrição: " . $produto->descricao;
?>