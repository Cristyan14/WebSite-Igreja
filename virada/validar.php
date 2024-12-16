<?php
include_once("config.php");
$query = "SELECT MAX(lote_familia) AS max_lote FROM virada";
$result = $conexao->query($query);



var_dump($_POST);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $max_lote = $row['max_lote'];

    if (is_null($max_lote)) {
        echo "Tabela vazia ou valores nulos. Definindo next_lote como 1.";
        $next_lote = 1;
    } else {
        $next_lote = $max_lote + 1;
        echo "Maior lote encontrado: $max_lote. Próximo lote: $next_lote.";
    }
} else {
    echo "Nenhum resultado na tabela. Definindo next_lote como 1.";
    $next_lote = 1;
}

echo 'antes clique';
if (!isset($_POST['enviar'])) {

    echo 'oiu';

    $lote_counter = $next_lote;

    $total_adulto = $conexao->real_escape_string($_POST['total_adulto']);
    $nomes = $_POST['nome'];
    $cpfs = $_POST['cpf'];
    
    $telefones = $_POST['telefone'];
    $sobremesa = $conexao->real_escape_string($_POST['sobremesa']);


    if (count($nomes) === count($cpfs) && count($cpfs) === count($telefones) && count($telefones)) {
        for ($i = 0; $i < count($nomes); $i++) {

            $nome = $conexao->real_escape_string($nomes[$i]);
            $cpf = $conexao->real_escape_string($cpfs[$i]);
            $telefone = $conexao->real_escape_string($telefones[$i]);
            $lote = $lote_counter;

    
            $comando = "INSERT INTO virada (nome, cpf, lote_familia, numero, sobremesa) VALUES ('$nome', '$cpf', '$lote_counter', '$telefone', '$sobremesa')";

            $result = $conexao->query($comando);

            if (!$result) {

                echo "Erro ao inserir registro: " . $conexao->error;
            }
            if (($i + 1) % count($nomes) == 0) {
                $lote_counter++;
            }
        }
        echo "Inscrições adicionadas com sucesso!";
    } else {
        echo "Erro: Dados do formulário estão inconsistentes.";
    }
    $linkPagamento = "";
        switch ($total_adulto) {
            case 1:
                $linkPagamento = "https://mpago.la/1ccTF1J";
                break;
            case 2:
                $linkPagamento = "https://mpago.la/2VkMUco";
                break;
            case 3:
                $linkPagamento = "https://mpago.la/1RKYFe1";
                break;
            case 4:
                $linkPagamento = "https://mpago.la/2xKPnNa";
                break;
            case 5:
                $linkPagamento = "https://mpago.la/2sav1u9";
                break;
            case 6:
                $linkPagamento = "https://mpago.la/2ke7DPg";
                break;
            case 7:
                $linkPagamento = "https://mpago.la/2MCGTQF";
                break;
            default:
            echo "Valor não reconhecido: " . $total_adulto;
        }
    
       
        header("Location: " . $linkPagamento);
        exit();
    } else {

        echo "Erro ao registrar os dados: a" . $conexao->error;
    }


?>
