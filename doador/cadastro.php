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
	<option value="fidelizado">Fidelizado</option>
	<option value="exporadico">Exporádico</option>
	<option value="anual">Anual</option>
</select>

<select id="dia" name="dia" style="display: none;">
	<option value="default">Doa todo dia...</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>

<select id="mes" name="mes" style="display: none;">
	<option value="default">Doa todo mês...</option>
	<option value="Janeiro">Janeiro</option>
	<option value="Fevereiro">Fevereiro</option>
	<option value="Março">Março</option>
	<option value="Abril">Abril</option>
	<option value="Maio">Maio</option>
	<option value="Junho">Junho</option>
	<option value="Julho">Julho</option>
	<option value="Agosto">Agosto</option>
	<option value="Setembro">Setembro</option>
	<option value="Outubro">Outubro</option>
	<option value="Novembro">Novembro</option>
	<option value="Dezembro">Dezembro</option>
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

	tC = document.getElementById('tipoCliente');

	tC.addEventListener("change",function(){
		val = tC.value;

		if(val == "Fidelizado"){
			document.getElementById('dia').style.display = "inline";
		} else {
			document.getElementById('dia').style.display = "none";
		}

		if(val == "Anual"){
			document.getElementById('mes').style.display = "inline";
		} else {
			document.getElementById('mes').style.display = "none";
		}
	});

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