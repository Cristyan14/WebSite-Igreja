<?php

include("config.php");



if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $dia = $_POST['dia'];
    $sql = "INSERT INTO primeiros_passos (nome, telefone, dia) VALUES (?, ?, ?)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $telefone, $dia);
    $stmt->execute();

    $stmt->close();

    header("Location: primeiros_passos.php");
 
}


?>