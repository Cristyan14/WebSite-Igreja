<?php
include("config.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$erro = [];
if(isset($_POST['submit'])){
    $email = $conexao->real_escape_string($_POST['email']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erro[] = "E-mail Inválido!";
    }

    $sql = "SELECT m.id ,m.senha, c.id_membro, c.email from membros m, contato c where m.id = c.id_membro and c.email = '$email'";
    $query = $conexao->query($sql) or die ($conexao->error);
    $total = $query->num_rows;

    if($total == 0){
        $erro[] = "E-mail não encontrado em nossa base de dados!";
    }
    if(count($erro) == 0 && $total > 0){
        $novasenha = substr(md5(time()),0,6);
        $criptografada = md5(md5($novasenha));
    }if(mail($email, "Sua nova senha", "Sua nova senha é: ".$novasenha)){
        $sql_codigo = "UPDATE membros set senha = '$criptografada' where email = '$email'";
        $sql_query = $conexao->query($sql_codigo) or die ($conexao->error);
        if($sql_codigo){

            echo ("<script> 
            alert('Senha enviada para o email informado!');
            window.location.href= 'login.php';
            </script>");
        }
    }


}
if (!empty($erro)) {
    foreach ($erro as $e) {
        echo "<p style='color:red;'>$e</p>";
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
              <span class="padding-bottom--15">Recupere sua conta</span>
              <?php if (!empty($erro)): ?>
                <div class="error"><?= htmlspecialchars($erro) ?></div>
              <?php endif; ?>
              <form action ="esqueci_senha.php" method= "POST">
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="email" placeholder="Digite seu E-mail">
                  <span class="error" id="formError"></span>
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