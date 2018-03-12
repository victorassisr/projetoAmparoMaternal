<?php

	if(isset($_GET['pag']) && $_GET['pag'] == 'doador' && isset($_GET['id']) && $_GET['id'] != ""){
		$id_doador = $_GET['id'];

	require_once('conexao.php');
	$con = conexaoMysql();

	//Busca Doador
	$sql = "SELECT id_doador, nome FROM doador WHERE id_doador = :id_doador";
	$busca = $con->prepare($sql);
	$busca->bindValue(':id_doador',$id_doador);
	$busca->execute();
	if($busca->rowCount() == 1){
		$doador = $busca->fetch(PDO::FETCH_OBJ);

	//Busca Campanhas
	$sql = "SELECT id_campanha, nomeCampanha FROM campanhas";
	$busca = $con->prepare($sql);
	$busca->execute();
	$campanhas = $busca->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Doacao</title>
</head>
<body>
	<form action="cadastrarDoacao.php" method="POST">

		<label for="itemDoacao">O que foi doado?</label>
		<input type="text" name="itemDoacao" id="itemDoacao">

		<br><br>

		<select name="campanha">
			<option value="default">Selecione a Campanha..</option>
			<?php foreach($campanhas as $campanha){ ?>
			<option value="<?php echo $campanha->id_campanha; ?>"><?php echo $campanha->nomeCampanha; ?></option>
			<?php } ?>
		</select>

		<br><br>

		<label for="doador">Doador: </label>
		<input type="text" name="doador" id="doador" value="<?php echo $doador->nome; ?>" readonly>
		<input type="hidden" name="id_doador" value="<?php echo $doador->id_doador; ?>">

		<br><br>

		<label for="dataDoacao">Data da Doação</label>
		<input type="date" name="dataDoacao" id="dataDoacao">

		<br><br>

		<label for="quantidade">Quantidade: </label>
		<input type="number" name="quantidade" id="quantidade">

		<br><br>

		<label for="valorDinheiro">Valor Doado: </label>
		<input type="text" name="valorDinheiro" id="valorDinheiro">

		<br><br>

		<select name="tipoDinheiro">
			<option value="default">Selecione uma opção...</option>
			<option value="1">Depósito</option>
			<option value="2">Em Espécie</option>
			<option value="3">Cheque</option>
			<option value="4">Cartão</option>
		</select>

		<br><br>

		<select name="tipoItem">
			<option value="default">Selecione uma opção...</option>
			<option value="1">Roupas</option>
			<option value="2">Dinheiro</option>
			<option value="3">Outros</option>
		</select>

		<br><br>

		<input type="submit" value="Cadastrar">
	</form>

	<script>
		
		//COLOCAR DATA NO INPUT DATA DE DOAÇÂO
	dataDoacao = document.getElementById('dataDoacao');
	
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
	dataDoacao.value = dataAtual; //Coloca a data validada no input.

	//FIM COLOCAR DATA NO INPUT DATA DE CADASTRO
	</script>


</body>
</html>

<?php
		} else {
			echo "O doador não existe! Selecione um doador válido!";
		}

	} else {
		echo "Voce deve selecionar um usuário para cadastrar a doação primeiro!";
	}

$con = null;
?>

