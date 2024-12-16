<!DOCTYPE html>
<html lang="pt-br">
<head>

 <meta charset="UTF-8">
 
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/style.css">
 <title>Mensageiros da Palavra</title>
</head>
<body>

<section class="menu">
 <header id="header">
     <img src="img/logo.png" alt="" srcset="">
  
     <nav id="nav">
       
         <button id="btn-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
             <span id="hamburger"></span>
         </button>
         <ul id="menu" role='menu'>
       
             <li><a href="#inicio">Inicío</a></li>
             <li><a href="#sobre">Sobre</a></li>
             <li><a href="#ministerios">Ministérios</a></li>
             <li><a href="#calendario">Calendário</a></li>
             <li><a href="login.php">Login</a></li>

         </ul>
     </nav>
 </header>

    <section class="formulario">
        <div class="form">
        <form method="POST" action="validar.php">
        <h1>Registra</h1>

        <div id="inscricoes-container">
        <div class="inscricao-set">
        <br><br>
        <div class="div">
           <label for="nome">Nome: </label>    
             <input type="nome" class="nome" required name="nome" placeholder="Digite seu Nome completo:">
         </div>
         <br>
         <div class="div">
           <label for="nome">Nome: </label>    
             <input type="nome" class="nome" required name="nome" placeholder="Digite seu Nome completo:">
         </div>
         <div class="div">
           <label for="email">E-mail: </label>    
             <input type="email" class="email" required name="email" placeholder="Digite seu E-mail:">
         </div>
         <br>   
         <div class="div">
           <label for="senha">Senha: </label>    
             <input type="password" class="senha" required name="senha" placeholder="Digite sua Senha: ">
         </div>
         <br>
         <div class="enviar">
             <button type="submit" name="submit" class="glow-on-hover" >Login</button>
         </div>
        </form>
        </div>

    </section>
    <footer>

    </footer>
<script src="js/mobile.js"></script>
<script src="js/tot_valor.js"></script>
</body>
</html>