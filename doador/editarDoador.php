<?php
require_once("../conexao.php");

	$con = conexaoMySql();
if(($_GET['id']) == false){
	$con=null;
	echo "Você não selecionou ngm!";
} else {
	$id = $_GET['id'];

	$sql = "SELECT * FROM doador WHERE id_doador = :id";

	$listar = $con->prepare($sql);
	$listar->bindValue(':id',$id);
	$listar->execute();
	if($listar->rowCount() == 0){
		echo "Doador inexistente!";
	} else {
		$doador = $listar->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Doador</title>
</head>
<body>
<form method="post" action="updateDoador.php">
<label for="nome">Nome:</label>
<input type="text" id="nome" name="nome" value="<?php echo $doador->nome; ?>" required>
<br><br>
<label for="endereco">Endereco:</label>
<input type="text" id="endereco" name="endereco" value="<?php echo $doador->endereco; ?>">
<br><br>
<label for="email">E-Mail</label>
<input type="email" id="email" name="email" value="<?php echo $doador->email; ?>">
<br><br>
<label for="residencial">Telefone Residencial</label>
<input type="tel" id="residencial" name="residencial" value="<?php echo $doador->telefoneResidencial; ?>">
<br><br>
<label for="tel1">Celular: </label>
<input type="tel" id="tel1" name="tel1" value="<?php echo $doador->celular1; ?>">
<br><br>
<label for="tel2">Celular: </label>
<input type="tel" id="tel2" name="tel2" value="<?php echo $doador->celular2; ?>">
<br><br>
<label for="nascimento">Nascimento: </label>
<input type="date" id="nascimento" name="nascimento" value="<?php echo $doador->nascimento; ?>">
<br><br>
<label for="dataCadastro">Cadastro: </label>
<input type="date" id="dataCadastro" name="dataCadastro" value="<?php echo $doador->dataCadastro; ?>">
<br><br>
<select id="tipoCliente" name="tipoCliente">
	<option value="default">Tipo de Cliente..</option>
	<?php if($doador->tipoDoador == 'fidel'){?>
	<option value="fidel" selected>Fidelizado</option>
	<?php } else {?>
	<option value="fidel">Fidelizado</option>
	<?php } if($doador->tipoDoador == 'exp'){?>
	<option value="exp" selected>Exporádico</option>
	<?php } else {?>
	<option value="exp">Exporádico</option>
	<?php } if($doador->tipoDoador == 'anual'){?>
	<option value="anual" selected>Anual</option>
	<?php } else {?>
	<option value="anual">Anual</option>
	<?php } ?>
</select>
<br><br>
<select id="tipoPessoa" name="tipoPessoa">
	<option value="default">Pessoa..</option>
	<?php if($doador->tipoPessoa == 'fisica'){?>
	<option value="fisica" selected>Pessoa Fisica</option>
	<?php }else{?>
	<option value="fisica">Pessoa Fisica</option>
	<?php }if($doador->tipoPessoa == 'juridica'){ ?>
	<option value="juridica" selected>Pessoa Jurídica</option>
	<? } else { ?>
	<option value="juridica">Pessoa Jurídica</option>
	<?php } ?>
</select>
<br><br>
<label for="operadora">Operadora: </label>
<input type="text" id="operadora" name="operadora" value="<?php echo $doador->operadora; ?>">
<br><br>
<label for="turma">Turma: </label>
<input type="text" id="turma" name="turma" value="<?php echo $doador->turma; ?>">
<br><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<button type="submit">Cadastrar</button>
</form>

<?php 
	$con=null; 
	}
	} 
?>