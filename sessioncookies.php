<?php
session_start();

// Processa o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POS['nome'] ?? '';
    $lembrar = isset($_POST['lembrar']);

    $_SESSION['usuario'] = $nome;

    if ($lembrar) {
        setcookie('usuario', $nome, time() + (86400 * 30), "/");
    } else {
        setcookie('usuario', '', time() - 3600, "/");
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Verifica usuário
$nomeNaSessao = $_SESSION['usuario'] ?? '';
$nomeNoCookie = $_COOKIE['usuario'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com Sessão e Cookie</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.92);
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #bbb;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .welcome {
            background: #d9f7e7;
            border: 1px solid #27ae60;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            text-align: center;
            color: #145a32;
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }

        .logout a {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login com Sessão e Cookie</h2>

    <?php if ($nomeNaSessao): ?>
        <div class="welcome">
            Olá, <strong><?php echo htmlspecialchars($nomeNaSessao); ?></strong>! Você está logado.
        </div>
        <div class="logout">
            <a href="?logout=1">Sair</a>
        </div>
    <?php else: ?>
        <form method="post" action="">
            <label for="nome">Seu nome:</label>
            <input type="text" name="nome" id="nome" required
                 value="<?php echo htmlspecialchars($nomeNoCookie); ?>">
            <label>
                <input type="checkbox" name="lembrar" <?php if ($nomeNoCookie) echo 'checked'; ?>> Lembrar meu nome
            </label>

            <input type="submit" value="Entrar">
        </form>
    <?php endif; ?>
</div>

<?php
// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

</body>
</html>