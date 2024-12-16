<?php
include('header.php'); // Inclui o controle de acesso

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA OPERACIONAL</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['nome'] ?? 'Visitante'; ?>!</h1>
    
    <p>Escolha uma página para acessar:</p>

    <!-- Botão para página pública -->
    <button onclick="window.location.href='../index.php'">Página Pública</button>

    <!-- Botão para página privada -->
    <button onclick="window.location.href='../cadastro/cadastro.php'">Página Privada</button>

    <p>
        <a href="logout.php">Sair</a>
    </p>

</body>
</html>
