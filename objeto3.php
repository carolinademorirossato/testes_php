<?php
//insere a classe
include_once "produto.php";

// cria um objeto
$produto1 = new Produto;
$produto2 = new Produto;

// atribuir valores
$produto1->codigo = 4001;
$produto1->descricao = "CD - The Best of Eric Clapton";
$produto1->preco = "R$ 50,00";
$produto1->quantidade = 5;

$produto2->codigo = 4002;
$produto2->descricao = 'CD - The Eagles Hotel California';
$produto2->preco = "R$ 60,00";
$produto2->quantidade = 5;

// imprime informações de etiqueta
$produto1->imprimeEtiqueta();
$produto2->imprimeEtiqueta();
?>
