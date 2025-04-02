<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
</head>
<body>

<?php
session_start();

// Inicializa o carrinho se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Lista de produtos
$produtos = [
    1 => ['nome' => 'Produto 1', 'preco' => 10.00],
    2 => ['nome' => 'Produto 2', 'preco' => 20.00],
    3 => ['nome' => 'Produto 3', 'preco' => 30.00],   
];
?>

    <h1>Produtos</h1>
    <ul>
        <?php foreach ($produtos as $id => $produto): ?>
            <li>
              <?php echo $produto['nome']; ?> - R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
              <a href="adicionar_carrinho.php?id=<?php echo $id; ?>">Adicionar ao Carrinho</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="carrinho.php">Ver Carrinho</a>
</body>
</html>