<?php

$USUARIO = "root";
$SENHA = "m4VHV9f)le6h*@qv";
$DATABASE = "login";
$HOST = "localhost";


$MYSQLI = new mysqli($HOST, $USUARIO, $SENHA, $DATABASE);
if ($MYSQLI->connect_errno) {
    echo "falha ao conectar:(" . $MYSQLI->connect_errno . $MYSQLI->connect_error;
} else
    echo "";
