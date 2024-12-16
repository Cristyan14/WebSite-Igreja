<?php
include_once("config.php");

$titulo = $_POST['titulo'] ?? null;
$conteudo = $_POST['conteudo'] ?? null;
$resumo = $_POST['resumo'] ?? null;
$autor = $_POST['autor'] ?? null;
$imagem = $_FILES['imagem']['name'] ?? null;
$upload_diretorio = '../uploud/';
if($imagem){
    $imagemTemp = $_FILES['imagem']['tmp_name'];
    $imagemDest = $upload_diretorio . basename($imagem);
    if (move_uploaded_file($imagemTemp, $imagemDest)) {
        echo "Upload realizado com sucesso!";
    } else {
        echo "Erro ao realizar o upload.";
    }
}
if ($titulo && $conteudo && $autor) {
    $sql = "INSERT INTO devocional (titulo, resumo, conteudo, autor, imagem) VALUES (?, ?, ?,?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $titulo, $resumo, $conteudo, $autor,$imagem);

    if ($stmt->execute()) {
        header("Location: inserir_devocional.php");
    } else {
        echo "Erro ao cadastrar devocional: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Por favor, preencha todos os campos!";
}

?>