<?php

$USUARIO = "root"; // Nome de usuário do MySQL
$SENHA = "1044"; // Senha do MySQL (deixe em branco se não houver)
$DATABASE = "ticketzones"; // Nome do banco de dados
$HOST = "localhost"; // O host do banco de dados (normalmente "localhost")
$PORT = 3306; // A porta do MySQL (opcional, padrão é 3306)

$MYSQLI = new mysqli($HOST, $USUARIO, $SENHA, $DATABASE, $PORT);

// Verifica se a conexão foi bem-sucedida
if ($MYSQLI->connect_error) {
    die("Conexão falhou: " . $MYSQLI->connect_error);
}

echo "Conexão bem-sucedida!";

// Lembre-se de fechar a conexão quando terminar
// $MYSQLI->close();
