<?php
//insere a classe
include_once "produto.php";

// cria um objeto
$produto1 = new Produto;
$produto2 = new Produto;

// atribuir valores
$produto1->codigo = 4001;
$produto1->descricao = "CD - The Best of Eric Clapton";

$produto2->codigo = 4002;
$produto2->descricao = 'CD - The Eagles Hotel California';

// imprime informações de etiqueta
$produto1->imprimeEtiqueta();
$produto2->imprimeEtiqueta();
?>
