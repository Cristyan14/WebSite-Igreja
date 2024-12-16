<?php 
require_once("config.php");

$sql = "SELECT * FROM devocional ORDER BY data_publicacao DESC";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_devocional.css">
    <title>Devocionais</title>
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
    <section class="devocionais">
        <div class="devocionais-content">
                <ul class="devocionais-grid">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <li class="devocional-item">
                                <a href="devocional.php?id=<?= $row['id'] ?>">
                                <img src="../uploud/<?= htmlspecialchars($row['imagem'], ENT_QUOTES, 'UTF-8') ?>" alt="Imagem do Devocional">
                                   <h1><?= htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8') ?></h1>
                                   <p><?= htmlspecialchars($row['resumo'], ENT_QUOTES, 'UTF-8') ?></p>
                                   <span><?= htmlspecialchars($row['autor'], ENT_QUOTES, 'UTF-8') ?></span>
                                   <span><?= htmlspecialchars($row['data_publicacao'], ENT_QUOTES, 'UTF-8') ?></span>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>Nenhum devocional encontrado.</p>
                    <?php endif; ?>
                </ul>
        </div>
    </section>

    
    <footer>

    </footer>

    <script src="../js/mobile.js"></script>
</body>
</html>