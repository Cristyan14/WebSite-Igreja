<?php
if (!isset($_SESSION)) {
    session_start();
}

// Define as permissões de acesso
$permissoes = [
    'membro' => ['../calendario/calendario.php', "login.php", "../index.php", "publicPage1.php", "home.php"], // Apenas estas páginas
    'pastor' => ['*'] // Acesso total
];

// Obtém o nível do usuário da sessão
$nivel = isset($_SESSION['level']) ? $_SESSION['level'] : null;


// Obtém a página atual
$pagina_atual = basename($_SERVER['PHP_SELF']);

// Verifica se o usuário está logado
if (!$nivel) {
    echo "Você precisa estar logado para acessar esta página.";
    header("Location: teste.php");
    exit;
}

// Verifica permissões
if ($nivel !== 'pastor') { // Pastores têm acesso total
    if (!in_array($pagina_atual, $permissoes[$nivel])) {
        echo "Acesso negado! Você não tem permissão para acessar esta página.";
        header("Location: home.php");
        exit;
    }
}
?>
