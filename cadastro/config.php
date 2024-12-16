<?php
 
    $dbHost = ''; // 
    $dbUsername = '';
    $dbPassword = '';
    $dbName = '';

    
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

 
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    } else {
        // echo "Conexão efetuada com sucesso"; 
    }
?>
