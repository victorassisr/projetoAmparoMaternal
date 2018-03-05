<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Doador</title>
</head>
<body>
<form method="post" action="cadastrarDoador.php">
<label for="nome">Nome:</label>
<input type="text" id="nome" name="nome" required>
<br><br>
<label for="endereco">Endereco:</label>
<input type="text" id="endereco" name="endereco">
<br><br>
<label for="email">E-Mail</label>
<input type="email" id="email" name="email">
<br><br>
<label for="residencial">Telefone Residencial</label>
<input type="tel" id="residencial" name="residencial">
<br><br>
<label for="tel1">Celular: </label>
<input type="tel" id="tel1" name="tel1">
<br><br>
<label for="tel2">Celular: </label>
<input type="tel" id="tel2" name="tel2">
<br><br>
<label for="nascimento">Nascimento: </label>
<input type="date" id="nascimento" name="nascimento">
<br><br>
<label for="dataCadastro">Cadastro: </label>
<input type="date" id="dataCadastro" name="dataCadastro">
<br><br>
<select id="tipoCliente" name="tipoCliente">
	<option value="default">Tipo de Cliente..</option>
	<option value="fidel">Fidelizado</option>
	<option value="exp">Exporádico</option>
	<option value="anual">Anual</option>
</select>
<br><br>
<select id="tipoPessoa" name="tipoPessoa">
	<option value="default">Pessoa..</option>
	<option value="fisica">Pessoa Fisica</option>
	<option value="juridica">Pessoa Jurídica</option>
</select>
<br><br>
<label for="operadora">Operadora: </label>
<input type="text" id="operadora" name="operadora">
<br><br>
<label for="turma">Turma: </label>
<input type="text" id="turma" name="turma">
<br><br>
<button type="submit">Cadastrar</button>
</form>

<script type="text/javascript">
	function teste(){
		var sel = document.getElementById("tipoCliente");
		console.log(sel.options[sel.selectedIndex].value);
	}

	//COLOCAR DATA NO INPUT DATA DE CADASTRO
	cadastro = document.getElementById('dataCadastro');
	
	data = new Date(); //Cria uma nova data
	dia = data.getDate();	//Pega o dia
	mes = data.getMonth() + 1; //Pega o mes [0 a 11] soma mais 1 pra ficar certo.
	ano = data.getFullYear(); //Pega o ANO.

	if(dia < 10){	//Se o dia for menor q 10, coloca o 0 antes.
		dia = "0"+dia;
	}
	if(mes < 10){	//Se o mes for menor q 10, coloca o 0 antes.
		mes = "0"+mes;
	}

	dataAtual = ano + "-" + mes + "-" + dia; //Formata a data para ser valida no value do input.
	cadastro.value = dataAtual; //Coloca a data validada no input.

	//FIM COLOCAR DATA NO INPUT DATA DE CADASTRO

	nascimento = document.getElementById('nascimento');
	nascimento.value = "1990-01-01";
</script>
</body>
</html>