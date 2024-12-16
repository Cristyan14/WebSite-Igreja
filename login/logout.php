<?php

if(!isset($_SESSION)){
    session_start();
}

session_destroy();

HEADER("Location: teste.php");
