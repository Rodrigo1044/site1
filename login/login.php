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
        $SQL_QUERY = $MYSQLI->query($SQL_CODE)  or die("falha na execução do código SQL: " . $MYSQLI->error);

        $QUANTIDADE = $SQL_QUERY->num_rows;

        if ($QUANTIDADE == 1) {

            $USUARIO = $SQL_QUERY->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $USUARIO['id'];
            $_SESSION['nome'] = $USUARIO['nome'];

            header("location: painel.php");
        } else {
            echo "falha ao logar! E-mail ou senha incorretos";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email"></br>
        </p>
        <P>
            <label>senha</label>
            <input type="password" name="senha"></br>
        </P>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>

    <b>Não tem conta? <a href="registro.php">Clique aqui!</a></b>
</body>

</html>