<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $numero = $_POST['telefone'];
        $sobremesa = $_POST['sobremesa'];
  
        $pagamento_final = $_POST['pagamento_final'];
        
        $sqlUpdate = "UPDATE virada SET nome='$nome',cpf='$cpf',numero='$numero',sobremesa='$sobremesa',pagamento_final='$pagamento_final' WHERE id=$id";
        $result = $conexao->query($sqlUpdate);
        print_r($result);
    }
    header('Location: painel-adm.php');

?>