<?php
if (!isset($_SESSION)) {
    session_start();
}
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Privada 1</title>
</head>
<body>
  <h1>Bem-vindo à Página Privada 1</h1>
  <p>Este conteúdo é exclusivo para usuários com acesso prioritário.</p>
  <a href="index.php">Voltar para o Sistema</a>
</body>
</html>
