<?php

include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Obtenção dos dados do formulário
	$usuario = $_POST['usuario'];
	$genero = $_POST['genero'];
	$cpf = $_POST['cpf'];
	$nascimento = $_POST['nascimento'];
	$chamado = $_POST['chamado'];
	$email = $_POST['email'];
	$numero = $_POST['numero'];
	$estado = $_POST['estados'];
	$cidade = $_POST['cidades'];
	$senha = $_POST['senha'];

	// Prepara a consulta SQL
	$stmt = $MYSQLI->prepare("INSERT INTO usuarios (usuario, cpf, email, telefone, senha) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $usuario, $cpf, $email, $numero, $senha);

	// Executa a consulta
	if ($stmt->execute()) {
		echo "Cadastro realizado com sucesso!";
	} else {
		echo "Erro: " . $stmt->error;
	}

	// Fecha a consulta
	$stmt->close();
}

?>

<html>

<head>

</head>

<body>

	<form action="" method="POST">

		<center>
			<h2> Sobre você </h2>
			<center><input type="text" name="usuario" maxlength="100" placeholder="Nome completo" required><br />

				<select name="genero">
					<option>Gênero</option>
					<option value="masculino">Masculino</option>
					<option value="feminino">Femenino</option>
					<option value="nbinario">Não binário</option>
					<option value="ninformar">Prefiro não informar</option>
				</select>

				<input type="text" name="cpf" maxlength="11" placeholder="CPF" required><br />
				<input type="date" name="nascimento" required>
				<input type="text" name="chamado" placeholder="Como quer ser chamado?"><br />
			</center>

			<center>
				<h2> Contato </h2>
				<center><input type="email" name="email" placeholder="Email" required>
					<input type="text" name="numero" placeholder="Número de telefone(DD)" required><br />
				</center>

				<center>
					<h2> Endereço </h2>

					<select name="estados" id="estados" onchange="carregarCidades()">
						<option value="">Selecione um estado</option>
						<option value="AC">Acre (AC)</option>
						<option value="AL">Alagoas (AL)</option>
						<option value="AP">Amapá (AP)</option>
						<option value="AM">Amazonas (AM)</option>
						<option value="BA">Bahia (BA)</option>
						<option value="CE">Ceará (CE)</option>
						<option value="DF">Distrito Federal (DF)</option>
						<option value="ES">Espírito Santo (ES)</option>
						<option value="GO">Goiás (GO)</option>
						<option value="MA">Maranhão (MA)</option>
						<option value="MT">Mato Grosso (MT)</option>
						<option value="MS">Mato Grosso do Sul (MS)</option>
						<option value="MG">Minas Gerais (MG)</option>
						<option value="PA">Pará (PA)</option>
						<option value="PB">Paraíba (PB)</option>
						<option value="PR">Paraná (PR)</option>
						<option value="PE">Pernambuco (PE)</option>
						<option value="PI">Piauí (PI)</option>
						<option value="RJ">Rio de Janeiro (RJ)</option>
						<option value="RN">Rio Grande do Norte (RN)</option>
						<option value="RS">Rio Grande do Sul (RS)</option>
						<option value="RO">Rondônia (RO)</option>
						<option value="RR">Roraima (RR)</option>
						<option value="SC">Santa Catarina (SC)</option>
						<option value="SP">São Paulo (SP)</option>
						<option value="SE">Sergipe (SE)</option>
						<option value="TO">Tocantins (TO)</option>
					</select>

					<select name="cidades" id="cidades">
						<option value="">Selecione uma cidade</option>
					</select>

					<script>
						function carregarCidades() {
							var cidadesPorEstado = {
								'AC': ['Rio Branco', 'Cruzeiro do Sul', 'Sena Madureira'],
								'AL': ['Maceió', 'Arapiraca', 'Palmeira dos Índios'],
								'AP': ['Macapá', 'Santana', 'Oiapoque'],
								'AM': ['Manaus', 'Parintins', 'Itacoatiara'],
								'BA': ['Salvador', 'Feira de Santana', 'Vitória da Conquista'],
								'CE': ['Fortaleza', 'Juazeiro do Norte', 'Sobral'],
								'DF': ['Brasília'],
								'ES': ['Vitória', 'Vila Velha', 'Serra'],
								'GO': ['Goiânia', 'Anápolis', 'Aparecida de Goiânia'],
								'MA': ['São Luís', 'Imperatriz', 'Caxias'],
								'MT': ['Cuiabá', 'Várzea Grande', 'Rondonópolis'],
								'MS': ['Campo Grande', 'Dourados', 'Três Lagoas'],
								'MG': ['Belo Horizonte', 'Uberlândia', 'Contagem'],
								'PA': ['Belém', 'Ananindeua', 'Santarém'],
								'PB': ['João Pessoa', 'Campina Grande', 'Patos'],
								'PR': ['Curitiba', 'Londrina', 'Maringá'],
								'PE': ['Recife', 'Olinda', 'Caruaru'],
								'PI': ['Teresina', 'Parnaíba', 'Picos'],
								'RJ': ['Rio de Janeiro', 'Niterói', 'Petrópolis'],
								'RN': ['Natal', 'Mossoró', 'Parnamirim'],
								'RS': ['Porto Alegre', 'Caxias do Sul', 'Pelotas'],
								'RO': ['Porto Velho', 'Ji-Paraná', 'Ariquemes'],
								'RR': ['Boa Vista', 'Rorainópolis', 'Caracaraí'],
								'SC': ['Florianópolis', 'Joinville', 'Blumenau'],
								'SP': ['São Paulo', 'Campinas', 'Santos'],
								'SE': ['Aracaju', 'Itabaiana', 'Lagarto'],
								'TO': ['Palmas', 'Araguaína', 'Gurupi']
							};

							var estadoSelecionado = document.getElementById("estados").value;
							var cidadesSelect = document.getElementById("cidades");

							cidadesSelect.innerHTML = '<option value="">Selecione uma cidade</option>'; // Limpa as opções anteriores

							if (estadoSelecionado) {
								var cidades = cidadesPorEstado[estadoSelecionado];
								cidades.forEach(function(cidade) {
									var option = document.createElement("option");
									option.value = cidade;
									option.text = cidade;
									cidadesSelect.add(option);
								});
							}
						}
					</script>


					<h2> Senha </h2>

					<input type="password" name="senha" placeholder="Senha" required>
					<br />
					<br />
					<br />

					<button type="submit">Enviar</button>
					<br /><br />


	</form>

	<b>já tem uma conta?<a href="login.php">Clique aqui!</a></b>

</body>

</html>