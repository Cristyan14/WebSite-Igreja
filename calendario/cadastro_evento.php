<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style_cadastro_evento.css">
</head>
<body>
<header id="header">            
                  <nav id="nav">                 
                      <button id="btn-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
                          <span id="hamburger"></span>
                      </button>
                      <ul id="menu" role='menu'> 
                          <li><a href="../index.php">Inicío</a></li>
                          <li><a href="#sobre">Sobre</a></li>
                          <li><a href="#ministerios">Ministérios</a></li>
                          <li><a href="#blog">Blog</a></li>
                          <li><a href="calendario.php">Calendário</a></li>
                      </ul>
                  </nav>
              </header>
              <br><br>
    <section class="formulario">
        <form action="cadastrar_evento.php" method="POST">
            <h1>Cadastro Eventos - Mensageiros da Palavra</h1>

            <div class="div">
                <label for="title">Título do Evento:</label>
                <input type="text" name="title" id="" placeholder="Título Evento">
            </div>

            <div class="div">
            <label for="color">Selecione uma cor:</label>
                <select name="color" id="">
                        <option value="">Selecione uma opção</option>
                        <option name = "1" value="blue" class="option">Azul</option>
                        <option name = "2" value="red" class="option" >Vermelho</option>
                        <option name = "3" value="green" class="option" >Amarelo</option>        
                </select>
            </div>

            <div class="div">
                <label for="start">Selecione a data/hora do inicio do evento: </label>
                <input type="datetime-local" name="start" id="">
            </div>

            <div class="div">
                <label for="end">Selecione a data/hora do fim do evento: </label>
                <input type="datetime-local" name="end" id="">
            </div>

            <button type="submit" name="submit" >Cadastrar</button>

        </form>
    </section>
    <footer></footer>
    <script src="../js/mobile.js"></script>
</body>
</html>