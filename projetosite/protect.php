<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("Você não pode acessar essa está página porque não está logado.<p><a href=\"login.php\">Entrar</a></p>");
}
?>
