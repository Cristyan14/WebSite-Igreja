<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devocional</title>
    <link rel="stylesheet" href="../css/style_inserir_devocional.css">
</head>
<body>
<header id="header">
     <img src="../img/logo.png" alt="" srcset="">
  
     <nav id="nav">
       
         <button id="btn-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
             <span id="hamburger"></span>
         </button>
         <ul id="menu" role='menu'>
       
             <li><a href="../index.php">Inicío</a></li>
             <li><a href="#sobre">Sobre</a></li>
             <li><a href="#ministerios">Ministérios</a></li>
             <li><a href="../calendario/calendario.php">Calendário</a></li>


         </ul>
     </nav>
 </header>
    <section class="formulario">
        <div class="form-content">
            <form action="cadastrar_devocional.php" method="POST" enctype="multipart/form-data">
                <h1>Inserir Devocional- Mensageiros da Palavra</h1>

                <div class="div">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="" placeholder="Título" required>
                </div>

                
                <div class="div">
                    <label for="resumo">Mini Resumo:</label>
                    <input type="text" name="resumo" id="" maxlength="100" placeholder="Mini resumo (100 letras)" required>
                </div>

                <div class="div">
                    <label for="imagem" class="file-label">Imagem:</label>
                    <input type="file" name="imagem" id="imagem" accept=".jpg, .jpeg, .png, .avg" />
                    <span class="file-name" id="fileName">Nenhum arquivo selecionado</span>
                </div>

                <div class="div">
                <label for="conteudo">Escreva o Contéudo:</label><br>
                <textarea name="conteudo" id="" required></textarea>
                </div>

                <div class="div">
                    <label for="autor">Autor: </label>
                    <input type="text" name="autor" id="" required>
                </div>

        

                <button type="submit" name="submit" >Inserir</button>

            </form>
        </div>
    </section>

    <footer></footer>

    <script src="../js/file.js"></script>
    <script src="../js/mobile.js"></script>
  
</body>
</html>