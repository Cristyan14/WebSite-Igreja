<?php
include_once("config.php");

if (isset($_POST['submit'])) {


    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $rg = $_POST['rg'];
    $data_nascimento = $_POST['data_nascimento'];
    $estado_civil = $_POST['estado_civil'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $condicao_imovel = $_POST['condicao_imovel'];
    $telefone_celular = $_POST['telefone_celular'];
    $telefone_residencial = $_POST['telefone_residencial'];
    $email = $_POST['email'];
    $escolaridade = $_POST['escolaridade'];
    $profissao = $_POST['profissao'];
    $nome_pai = $_POST['nome_pai'];
    $nome_mae = $_POST['nome_mae'];
    $data_casamento = $_POST['data_casamento'];
    $nome_conjuge = $_POST['nome_conjuge'];
    $filhos = $_POST['filhos'];
    $carteirinha = $_POST['carteirinha'];
    $ministerio_parte = $_POST['ministerio_parte'];
  
    $lider = $_POST['lider'];
    $cargo_lider = $_POST['cargo_lider'];
    $ministerios = $_POST['cargo_ministerio'];
    $ministerios_string = implode(', ', $ministerios);
    $batizado = $_POST['batizado'];
    $ingresso_igreja = $_POST['ingresso_igreja'];  
    $data_batismo = $_POST['data_batismo'];
    $encontro_com_Deus = $_POST['encontro_com_Deus'];
    $primeiros_passos = $_POST['primeiros_passos'];



    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    $conexao->begin_transaction();
    try {


        $stmt1 = $conexao->prepare("INSERT INTO membros (nome, cpf, senha, rg, data_nascimento) 
                                    VALUES (?, ?, ?, ?, ?)");
        $stmt1->bind_param('sssss', $nome, $cpf, $senha, $rg, $data_nascimento);
        $stmt1->execute();

        $id_membro = $conexao->insert_id;
     
        $stmt2 = $conexao->prepare("INSERT INTO endereco (id_membro,cep, logradouro, bairro, numero, complemento, cidade, estado, condicao_imovel) 
                                    VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param('issssssss', $id_membro, $cep, $logradouro, $bairro, $numero, $complemento, $cidade, $estado, $condicao_imovel);
        $stmt2->execute();
        $id_endereco = $conexao->insert_id;
      
        $stmt3 = $conexao->prepare("INSERT INTO contato (id_membro,telefone_celular, telefone_residencial, email) 
                                    VALUES (?,?, ?, ?)");
        $stmt3->bind_param('isss', $id_membro,$telefone_celular, $telefone_residencial, $email);
        $stmt3->execute();
        $id_contato = $conexao->insert_id;
      
        $stmt4 = $conexao->prepare("INSERT INTO profissional (id_membro,escolaridade, profissao) 
                                    VALUES (?,?, ?)");
        $stmt4->bind_param('iss', $id_membro, $escolaridade, $profissao);
        $stmt4->execute();
        $id_profissional = $conexao->insert_id;

        $stmt5 = $conexao->prepare("INSERT INTO familia (id_membro, nome_pai, nome_mae, casamento, conjuge, filhos) 
                                    VALUES (?,?, ?, ?, ?, ?)");
        $stmt5->bind_param('isssss', $id_membro,$nome_pai, $nome_mae, $data_casamento, $nome_conjuge, $filhos);
        $stmt5->execute();
        $id_familia = $conexao->insert_id;
     
        $stmt6 = $conexao->prepare("INSERT INTO ministerial (id_membro,carteirinha, parte_ministerio,cargo_ministerial, lider, cargo_lider,ingresso_igreja, batizado, data_batismo, encontro_com_Deus, primeiros_passos) 
                                    VALUES (?,?,?,?, ?, ?,?, ?, ?, ?, ?)");
        $stmt6->bind_param('issssssssss', $id_membro,$carteirinha, $ministerio_parte, $ministerios_string,$lider, $cargo_lider, $ingresso_igreja,$batizado, $data_batismo, $encontro_com_Deus, $primeiros_passos);
        $stmt6->execute();
        $id_ministerial = $conexao->insert_id;

   
        $stmt_update = $conexao->prepare("UPDATE membros SET id_contato = ?, id_endereco = ?, id_familia = ?, id_profissional = ?, id_ministerial = ? WHERE id = ?");
        $stmt_update->bind_param('iiiiii', $id_contato, $id_endereco, $id_familia, $id_profissional, $id_ministerial, $id_membro);
        $stmt_update->execute();
        $conexao->commit();
        echo "Cadastro realizado com sucesso!";
        header("../login/login.php");
    } catch (Exception $e) {
        $conexao->rollback();
        echo "Erro ao realizar o cadastro: " . $e->getMessage();
    } finally {
        $conexao->close(); 
        
    }
}
?>
