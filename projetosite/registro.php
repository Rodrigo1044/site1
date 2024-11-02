<?php
error_reporting(0);

include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$usuario = $_POST['usuario'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$numero = $_POST['numero'];
	$senha = $_POST['senha'];
	$senha1 = $_POST['senha1'];

	
	if ($senha !== $senha1) {
        $senhaincorreta = "Senha não é igual!";
    } else {
        //vai entrar no SQL e vai ver se ja existe o mesmo cpf, emil e numero
        $stmt = $MYSQLI->prepare("SELECT * FROM usuarios WHERE cpf = ? OR email = ? OR numero = ?");
        $stmt->bind_param("sss", $cpf, $email, $numero);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            //se tiver o mesmo vai mostrar q ja ta cadastrado
            $erroCadastro = "Usuário já cadastrado!";
        } else {
            //se não tiver da pra se cadastrar bunitin
            $stmt = $MYSQLI->prepare("INSERT INTO usuarios (usuario, cpf, email, numero, senha) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $usuario, $cpf, $email, $numero, $senha);

            if ($stmt->execute()) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro: " . $stmt->error;
            }
        }

        $stmt->close();
    }
}


?>

<html>

<head>

</head>

<body> 

	<form action="" method="POST">
		<center>
			<h2> Cadastre-se </h2>
				<input type="text" name="usuario" maxlength="100" placeholder="Nome completo" required><br />
				<input type="text" name="cpf" maxlength="14" placeholder="CPF" oninput="aplicarMascaraCPF(this)" required><br />
				<input type="email" name="email" placeholder="Email" required><br/>
				<input type="text" name="numero" placeholder="Número de telefone(DD)" oninput="aplicarMascaraTelefone(this)" required><br />
				<input type="password" name="senha" placeholder="Senha" required><br/>
				<input type="password" name="senha1" placeholder="Repita a senha" required>
				<br />
				<br />
				<br />

				<button type="submit">Enviar</button>
				<br />
		</center>
	</form>
	<?php
		echo '<center>';
		if($senhaincorreta){
			echo '<br>'.$senhaincorreta.'<br><br>';
		}
		if (isset($erroCadastro)) {
			echo '<br>' . $erroCadastro . '<br><br>';
		}
		echo '</center>';
	?>

	<script>
        function aplicarMascaraCPF(input) {
            let cpf = input.value;
            cpf = cpf.replace(/\D/g, ""); 
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
            input.value = cpf;
        }

        function aplicarMascaraTelefone(input) {
            let telefone = input.value;
            telefone = telefone.replace(/\D/g, ""); 
            telefone = telefone.replace(/^(\d{2})(\d)/, "($1) $2"); 
            telefone = telefone.replace(/(\d{5})(\d{4})$/, "$1-$2"); 
            input.value = telefone;
        }
    </script>

	<center><b>Já tem uma conta?<a href="login.php">Clique aqui!</a></b></center>

</body>

</html>