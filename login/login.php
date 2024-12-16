<?php
include_once('config.php');

$erro = ""; // Variável para armazenar mensagem de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['email'])) {
        $erro = "Por favor, preencha o campo de email.";
    } else if (empty($_POST['password'])) {
        $erro = "Por favor, preencha o campo de senha.";
    } else {

        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['password']);

        // Consulta para pegar dados das tabelas membros e contato
        $sql_code = "
            SELECT 
                m.id AS id_membro, 
                m.nome,
                c.email, 
                m.senha, 
                m.level
            FROM 
                membros m
            LEFT JOIN 
                contato c
            ON 
                m.id = c.id_membro
            WHERE 
                c.email = '$email' AND m.senha = '$senha'";
        
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            // Armazenando dados na sessão
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['level'] = $usuario['level'];
            $_SESSION['email'] = $usuario['email']; // Dados da tabela contato

            if($usuario['level'] == 'pastor'){
              header('Location: ../cadastro/painel-mestre.php');
            }else if($usuario['level'] == 'membro'){
              header('Location: publicPage1.php');
            }else{
              echo "Erro";
            }
       
            exit;
        } else {
            $erro = "E-mail ou senha inválidos!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style_login.css">
    <title>Login</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
            <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
              <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
              <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
              <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
              <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
              <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
              <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
              <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
            </div>
            <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
              <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
            </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://mensageirosdapalavra.com/" rel="dofollow">MENSAGEIROS DA PALAVRA</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Entre em sua conta</span>
              <?php if (!empty($erro)): ?>
                <div class="error"><?= htmlspecialchars($erro) ?></div>
              <?php endif; ?>
              <form action ="login.php" method= "POST">
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="email">
                  <span class="error" id="formError"></span>
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Senha</label>
                    <div class="reset-pass">
                      <a href="https://web.whatsapp.com/11944585258">Esqueceu sua senha?</a>
                    </div>
                  </div>
                  <input type="password" name="password">
                  <span class="error" id="formError"></span>
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Lembre-se de mim
                  </label>
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">
                  <span class="error" id="formError"></span>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Você não tem conta ainda? <a href="../cadastro/cadastro.php">Cadastre-se</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">© Mensageiros</a></span>
              <span><a href="https://web.whatsapp.com/11944585258">Contato</a></span>
              <span><a href="#">Termos e Privacidade</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>