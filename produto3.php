<?php
class Produto
{
var $codigo;
var $descricao;
var $preco;
var $quantidade;
function imprimeEtiqueta()
{
print 'Código: ' . $this->codigo . "\n";
print 'Descrição: ' . $this->descricao . "\n";
print 'Preço: ' . $this->preco . "\n";
print 'Quantidade: ' . $this->quantidade . "\n";
}
}
?>
