<?php
if (!isset($_SESSION)) {
    session_start();
}
include("header.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

 <meta charset="UTF-8">
 <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/style.css">
 <title>Mensageiros da Palavra</title>
</head>
<body>


 <header id="header">
     <img src="../img/logo.png" alt="" srcset="">
  
     <nav id="nav">
       
         <button id="btn-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
             <span id="hamburger"></span>
         </button>
         <ul id="menu" role='menu'>
       
             <li><a href="index.php">Inicío</a></li>
             <li><a href="#sobre">Sobre</a></li>
             <li><a href="primeiros_passos/primeiros_passos.php">Primeiros Passos</a></li>
             <li><a href="calendario/calendario.php">Calendário</a></li>
             <li><a href="login/login.php">Login</a></li>
             <li><a href="cadastro/cadastro.php">Cadastre-se</a></li>


         </ul>
     </nav>
 </header>
    <section class="informacoes">

    </section>
    <section class="formulario">
        <div class="form">
        <form method="POST" id="inscricao" action="virada/validar.php">
        <h1>CEIA DA VIRADA</h1>
        <span>Valor por pessoa: R$30,00 (Churrasco). </span><br><br>
        <span>*Caso esteja com a Família, realizar todas as inscrições aqui</span>
        <div id="inscricoes-container">
        <div class="inscricao-set">
        <br><br>
   
         <div>
    <label for="quantidade_criancas">Quantidade de Menores de 14 anos:</label>
    <select id="quantidade_criancas">
  
    </select>
</div>
<br>

<div>
    <label for="quantidade_adultos">Quantidade de Maiores de 15 anos:</label>
    <select id="quantidade_adultos" name="total_adulto" >
  

    </select>
</div>
         <br>
      
      


        <div class="div pag">
            <span>* Uma sobremesa por família </span>
            
            </div>
        </div>
   
         <br>
         <div>
            <label for="sobremesa">Digite a sobremesa que será levada:</label>
            <br>
            <input type="text" name="sobremesa" id="sobremesa" placeholder="Digite a sobremesa desejada">
         </div>
         <br>
         <br>
         
        <div class="div-inscricoes" id="div-inscricoes">


        </div>

         <p>Valor total: <span id="valor_tot"></span></p>
         <br>
         <input type="hidden" name="total" id="total">
         <div class="enviar">
             <input type="submit" id="submit-btn" name="enviar" class="glow-on-hover" value="Inscreva-Se"></input>
         </div>

       

        </form>
        </div>

    </section>



    <footer>

    </footer>
    <script src="js/validar.js"></script>
<script src="js/mobile.js"></script>
<script src="js/tot_valor.js"></script>
</body>
</html>