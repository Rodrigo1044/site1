<?php
include('conexao.php');

// Consulta SQL para pegar as informações do usuário
$sql = "SELECT usuario, cpf, email, numero FROM usuarios";
$result = $MYSQLI->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .container {
            text-align: center;
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin: 0;
            font-size: 18px;
        }

        .container p {
            font-size: 16px;
            margin: 10px 0;
        }

        .divider {
            border-top: 1px solid black;
            margin: 15px 0;
        }

        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: black;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Verificando se há resultados e exibindo os dados
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h2>Usuario:</h2>";
                echo "<p>" . $row["usuario"] . "</p>";
                echo "<div class='divider'></div>";

                echo "<h2>CPF:</h2>";
                echo "<p>" . $row["cpf"] . "</p>";
                echo "<div class='divider'></div>";

                echo "<h2>Telefone:</h2>";
                echo "<p>" . $row["numero"] . "</p>";
                echo "<div class='divider'></div>";

                echo "<h2>E-mail:</h2>";
                echo "<p>" . $row["email"] . "</p>";
                echo "<div class='divider'></div>";
            }
        } else {
            echo "<p>Nenhum resultado encontrado.</p>";
        }

        // Fechando a conexão
        $MYSQLI->close();
        ?>

        <a href="logout.php" class="logout-button">Sair Conta</a>
    </div>
</body>

</html>