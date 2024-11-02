<?php

include('conexao.php');

// Consulta SQL para pegar as informações do usuário
$sql = "SELECT id, usuario, email FROM usuarios";
$result = $MYSQLI->query($sql);

// Verificando se há resultados e exibindo os dados
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo " - Nome: " . $row["usuario"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechando a conexão
$MYSQLI->close();
