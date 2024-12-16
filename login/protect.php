<?php
if(isset($_SESSION)){
    session_start();
  }
if (!isset($_SESSION['id'])){
    die("você não está logado.<p><a href=\"privacy.php\">Entrar</a></p>");
    }
?>