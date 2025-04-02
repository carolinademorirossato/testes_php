<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if(isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += 1;
    } else {
        $_SESSION['carrinho'][$id] = 1;
    }
}

header('Location: index.php');
exit;
?>