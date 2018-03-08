<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Campanha</title>
</head>
<body>
	<form action="cadastrarCampanha.php" method="post">
		<label for="campanha">Nome da Campanha</label>
		<input type="text" name="nomeCampanha" id="nomeCampanha" required>

		<br><br>

		<label for="campanha">Data de Inicio</label>
		<input type="date" name="dataInicial" id="dataInicial">

		<br><br>

		<label for="campanha">Nome de Término</label>
		<input type="date" name="dataFinal" id="dataFinal">

		<br><br>

		<input type="submit" value="Cadastrar" />
	</form>

<!--
	<script>
		
		//COLOCAR DATA NO INPUT DATA DE INICIO
	dataInicial = document.getElementById('dataInicial');
	dataFinal = document.getElementById('dataFinal');
	
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
	dataInicial.value = dataAtual; //Coloca a data validada no input.
	dataFinal.value = dataAtual; //Coloca a data validada no input.

	//FIM COLOCAR DATA NO INPUT DATA DE CADASTRO

	</script>

-->
</body>
</html>