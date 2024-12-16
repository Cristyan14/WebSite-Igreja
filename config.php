<?php
 
    $dbHost = 'SEUHOST'; // 
    $dbUsername = 'SEU_USARNAME';
    $dbPassword = 'SENHA';
    $dbName = 'NOMEDOBANCO';

    
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

 
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    } else {
        // echo "Conexão efetuada com sucesso"; 
    }
?>
