<?php
include_once("config.php");

if (isset($_POST['cpf'])) {
    $cpf = $conexao->real_escape_string($_POST['cpf']);

    // Verificar se o CPF já está registrado
    $sql = "SELECT * FROM virada WHERE cpf='$cpf'";
    $query = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($query) > 0) {
        $busca = "SELECT COUNT(*) AS total_pessoas
                  FROM virada
                  WHERE lote_familia = (SELECT lote_familia FROM virada WHERE cpf = '$cpf')";
        $result_busca = mysqli_query($conexao, $busca);
        $busca_resultado = mysqli_fetch_assoc($result_busca)['total_pessoas'];

        // Retornar a ação baseada no número de pessoas no lote
        echo "redirect_lote" . $busca_resultado;
    } else {
        echo "CPF disponível";
    }
}
?>
