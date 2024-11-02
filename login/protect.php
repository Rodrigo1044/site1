<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("você Não pode acessar essa está página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
}
