<!DOCTYPE html>
<html lang="pt-br">
<head>

 <meta charset="UTF-8">
 <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/style.css">
 <title>Mensageiros da Palavra</title>
</head>
<body>


 <header id="header">
     <img src="img/logo.png" alt="" srcset="">
  
     <nav id="nav">
       
         <button id="btn-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
             <span id="hamburger"></span>
         </button>
         <ul id="menu" role='menu'>
       
             <li><a href="index.php">Inicío</a></li>
        
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
        <div class="section-itens">
        <div class="limitador">
            <div class="div-logo">
                    <img src="img/logo.png" alt="">
            </div>
            <div class="div-text">
            <ul>
                <li><a href="../index.php">Inicío</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="primeiros_passos/primeiros_passos.php">Primeiros Passos</a></li>
                <li><a href="calendario/calendario.php">Calendário</a></li>
                </ul>
            </div>
            <div class="div-icons">
            <a href="https://www.facebook.com/@eusoumensageiros/" target="u_blank" style="width:25; height:25;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg></a>

            <a href="https://www.instagram.com/eusoumensageiros/" target="u_blank" style="width:25; height:25;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
            </svg></a>

            <a href="https://www.youtube.com/@mensageirosdapalavra1893" target="u_blank" style="width:25; height:25;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
            </svg></a>
            </div>

            <div class="copyright">
                    <p><a href="#">Politica de Privacidade</a></p>
                    <p>Copyright ©2024 | Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
    <script src="js/validar.js"></script>
<script src="js/mobile.js"></script>
<script src="js/tot_valor.js"></script>
</body>
</html>