<?php
include_once("config.php");


$id = $_GET['id'] ?? null;

if ($id) {

    $sql = "SELECT titulo, conteudo, autor, data_publicacao, imagem FROM devocional WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $devocional = $result->fetch_assoc();
    } else {
        echo "Devocional não encontrado.";
        exit;
    }
    $stmt->close();
} else {
    echo "ID inválido.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_devocional_unico.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($devocional['titulo'], ENT_QUOTES, 'UTF-8') ?></title>
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
    <div class="content">
        <section class="devocional">
        <p>Por <?= htmlspecialchars($devocional['autor'], ENT_QUOTES, 'UTF-8') ?> em <?= date('d/m/Y H:i', strtotime($devocional['data_publicacao'])) ?></p>
            <h1><?= htmlspecialchars($devocional['titulo'], ENT_QUOTES, 'UTF-8') ?></h1>
           
            <p><?= nl2br(htmlspecialchars($devocional['conteudo'], ENT_QUOTES, 'UTF-8')) ?></p>
        
            <a href="devocionais.php">Voltar para a lista</a>
        </section>
    </div>
</body>
</html>
