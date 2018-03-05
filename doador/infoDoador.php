<?php

	if(isset($_GET['id']) == false){
		echo "Ngm selecionado<br>";
	} else {
		require_once('conexao.php');

		$con = conexaoMySql();
		
		$id = $_GET['id'];
		
		$sql = "SELECT * FROM doador WHERE id_doador=:id";

		$listar = $con->prepare($sql);
		$listar->bindValue(':id',$id);
		$listar->execute();
	}

	if(isset($listar) == false){
		echo "Doador inexistente!";
	}else{
		$doador = $listar->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Informacoes do Doador - <?php echo $doador->nome; ?></title>
</head>
<body>
	<ul>
		<li>Nome: <?php echo $doador->nome; ?></li>
		<li>Endereco: <?php echo $doador->endereco; ?></li>
		<li>Email: <?php echo $doador->email; ?></li>
		<li>Telefone Residencial: <?php echo $doador->telefoneResidencial; ?></li>
		<li>Celular 1: <?php echo $doador->celular1; ?></li>
		<li>Celular 2: <?php echo $doador->celular2; ?></li>
		<li>Nascimento: <?php echo $doador->nascimento; ?></li>
		<li>Data de Cadastro: <?php echo $doador->dataCadastro; ?></li>
		<li>Tipo de Doador: <?php echo $doador->tipoDoador; ?></li>
		<?php if($doador->doaDia != 0){ ?>
		<li>Doa todo dia: <?php echo $doador->doaDia; ?></li>
		<?php } ?>
		<?php if($doador->doaMes != "nenhum"){ ?>
		<li>Doa todo mês: <?php echo $doador->doaMes; ?></li>
		<?php } ?>
		<li>Tipo de Pessoa: <?php echo $doador->tipoPessoa; ?></li>
		<li>Operadora: <?php echo $doador->operadora; ?></li>
		<li>Turma: <?php echo $doador->turma; ?></li>
	</ul>
</body>
</html>

<?php } ?>