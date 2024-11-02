<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera o valor do campo 'numero' do formulário
    $NUMERO = $_POST['numero'];

    // Verifica se o número é igual a 1
    if ($NUMERO == 1) {
        echo 'certo';
    } elseif (empty($NUMERO)) { // Verifica se não foi inserido um número
        echo 'coloque um número';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>

<body>
    <form action="" method="POST">
        <p>
            <label>Número</label>
            <input type="number" name="numero">
        </p>
        <p>
            <button type="submit">enviar</button>
        </p>
    </form>
</body>

</html>