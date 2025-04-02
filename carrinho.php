<?php
session_start();

if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$carrinho = $_SESSION['carrinho'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>
    <?php if (empty($carrinho)): ?>
        <p>Seu carrinho está vazio.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($carrinho as $id => $quantidade): ?>
                <li>
                   Produto ID: <?php echo $id; ?> - Quantidade: <?php echo $quantidade; ?>
                   <a href="remover_carrinho.php?id=<?php echo $id; ?>">Remover</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php">Continuar Comprando</a>
</body>
</html>