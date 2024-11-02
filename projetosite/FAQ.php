<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem  = $_POST['mensagem'];

    $stmt = $MYSQLI->prepare("INSERT INTO ajuda (nome, email, mensagem) VALUES (?,?,?)");
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    if ($stmt->execute()) {
        echo "Seu pedido foi enviado!";
    } else {
        echo "Falha no envio: " . $stmt->error;
    }

    $stmt->close();

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagem/png" href="img/bora.png">
    <title>Ajuda</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/palhaco.jpg');
            background-size: cover;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .top-bar {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .top-bar img {
            width: 200px;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            color: #fff;
            width: 320px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 10px;
        }

        .login-header h1 {
            margin: 0;
            font-size: 24px;
            text-align: left;
        }

        .logo-small {
            width: 100px;
            margin-left: 10px;
        }

        .login-description {
            margin-top: -5px;
            font-size: 18px;
            color: #ccc;
        }

        .login-container label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-container input[type="text"],
        .login-container input[type="email"],
        .login-container textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            background: #333;
            color: #fff;
            font-size: 14px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
        }

        .login-container a {
            color: #4a90e2;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <a href="index.php">
            <img src="img/teickett.png" alt="Ticket Zone Logo">
        </a>
    </div>

    <div class="login-container">
        <div class="login-header">
            <h1>FAQ</h1>
            <img src="img/teickett.png" class="logo-small" alt="Ticket Zone Logo">
        </div>
        <p class="login-description">Fale conosco</p>
        <form action="" method="POST">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </p>
            <p>
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
            </p>
            <p>
                <button type="submit">Enviar Solicitação</button>
            </p>
        </form>
    </div>
</body>
</html>
