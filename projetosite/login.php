<?php
include("conexao.php");

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo 'preencha seu e-mail';
    } else if (strlen($_POST['senha']) == 0) {
        echo "preencha sua senha";
    } else {

        $EMAIL = $MYSQLI->real_escape_string($_POST['email']);
        $SENHA = $MYSQLI->real_escape_string($_POST['senha']);

        $SQL_CODE = "SELECT * FROM usuarios WHERE email = '$EMAIL' AND senha = '$SENHA'";
        $SQL_QUERY = $MYSQLI->query($SQL_CODE) or die("falha na execução do código SQL: " . $MYSQLI->error);

        $QUANTIDADE = $SQL_QUERY->num_rows;

        if ($QUANTIDADE == 1) {
            $USUARIO = $SQL_QUERY->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $USUARIO['id'];
            $_SESSION['nome'] = $USUARIO['nome'];

            header("location: index.php");
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="shortcut icon" type="imagex/png" href="img/bora.png">
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
                padding: 40px;
                border-radius: 8px;
                text-align: center;
                color: #fff;
                width: 300px;
                position: relative;
            }

            .login-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-bottom: 10px;
            }

            .login-header h1 {
                margin: 0;
                font-size: 24px;
                text-align: left;
            }

            .logo-small {
                width: 100px; 
                position: absolute;
                top: 10px;
                right: 10px;
            }


            .login-description {
                margin-top: -5px;
                font-size: 20px;
                color: #ccc;
            }
            .login-container label {
                display: block;
                text-align: left;
                font-weight: bold;
                margin-bottom: 30px;
            }

            .login-container input[type="text"],
            .login-container input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: none;
                border-radius: 15px;
                background: #333;
                color: #fff;
                font-size: 14px; 
            }

            .login-container button {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background: linear-gradient(to right, #6a11cb, #2575fc);
                color: #fff;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
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
                color: #4a90e2; 
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
            <h1>Login</h1>
            <img src="img/teickett.png" class="logo-small" alt="Ticket Zone Logo">
        </div>
        <p class="login-description">Entre para comprar nossos ingressos</p>
        
        <form action="" method="POST">
            <p>
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email">
            </p>
            <p>
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha">
            </p>
            <p>
                <button type="submit">Entrar</button>
            </p>
        </form>
        <p>Não possui cadastro? <a href="registro.php">Criar nova conta!</a></p>
    </div>
</body>
</html>