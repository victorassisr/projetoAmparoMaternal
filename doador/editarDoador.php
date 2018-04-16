<?php
require_once("conexao.php");

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
	<?php if($doador->tipoDoador == 'fidelizado'){?>
	<option value="fidelizado" selected>Fidelizado</option>
	<?php } else {?>
	<option value="fidelizado">Fidelizado</option>
	<?php } if($doador->tipoDoador == 'exporadico'){?>
	<option value="exporadico" selected>Exporádico</option>
	<?php } else {?>
	<option value="exporadico">Exporádico</option>
	<?php } if($doador->tipoDoador == 'anual'){?>
	<option value="anual" selected>Anual</option>
	<?php } else {?>
	<option value="anual">Anual</option>
	<?php } ?>
</select>

<?php if(($doador->tipoDoador == "fidelizado") && ($doador->doaDia != "0")){ ?>
<select id="dia" name="dia" style="display: inline;">
<?php } else { ?>
<select id="dia" name="dia" style="display: none;">
<?php } ?>
	<option value="default">Doa todo dia...</option>

	<?php for($i=1; $i<=31; $i++){ 

		if($doador->doaDia == $i){ ?>
			<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
	<?php } else { ?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php } ?>

	<?php } //Fim do FOR ?> 
	
</select>

<?php if($doador->tipoDoador == "Anual" && $doador->doaMes != "nenhum"){ ?>
<select id="mes" name="mes" style="display: inline;">
<?php } else { ?>
<select id="mes" name="mes" style="display: none;">
	<?php } ?>
	<option value="default">Doa todo mês...</option>

	<?php if($doador->doaMes == "Janeiro"){ ?> 
	<option value="Janeiro" selected>Janeiro</option>
	<?php } else { ?>
	<option value="Janeiro">Janeiro</option>
	<?php } ?>

	<?php if($doador->doaMes == "Fevereiro"){?> 
	<option value="Fevereiro" selected>Fevereiro</option>
	<?php } else { ?>
	<option value="Fevereiro">Fevereiro</option>
	<?php } ?>

	<?php if($doador->doaMes == "Março"){?> 
	<option value="Março" selected>Março</option>
	<?php } else { ?>
	<option value="Março">Março</option>
	<?php } ?>

	<?php if($doador->doaMes == "Abril"){?> 
	<option value="Abril" selected>Abril</option>
	<?php } else { ?>
	<option value="Abril">Abril</option>
	<?php } ?>

	<?php if($doador->doaMes == "Maio"){?> 
	<option value="Maio" selected>Maio</option>
	<?php } else { ?>
	<option value="Maio">Maio</option>
	<?php } ?>

	<?php if($doador->doaMes == "Junho"){?> 
	<option value="Junho" selected>Junho</option>
	<?php } else { ?>
	<option value="Junho">Junho</option>
	<?php } ?>

	<?php if($doador->doaMes == "Julho"){?> 
	<option value="Julho" selected>Julho</option>
	<?php } else { ?>
	<option value="Julho">Julho</option>
	<?php } ?>

	<?php if($doador->doaMes == "Agosto"){?> 
	<option value="Agosto" selected>Agosto</option>
	<?php } else { ?>
	<option value="Agosto">Agosto</option>
	<?php } ?>

	<?php if($doador->doaMes == "Setembro"){?> 
	<option value="Setembro" selected>Setembro</option>
	<?php } else { ?>
	<option value="Setembro">Setembro</option>
	<?php } ?>

	<?php if($doador->doaMes == "Outubro"){?> 
	<option value="Outubro" selected>Outubro</option>
	<?php } else { ?>
	<option value="Outubro">Outubro</option>
	<?php } ?>


	<?php if($doador->doaMes == "Novembro"){?> 
	<option value="Novembro" selected>Novembro</option>
	<?php } else { ?>
	<option value="Novembro">Novembro</option>
	<?php } ?>

	<?php if($doador->doaMes == "Dezembro"){?> 
	<option value="Dezembro" selected>Dezembro</option>
	<?php } else { ?>
	<option value="Dezembro">Dezembro</option>
	<?php } ?>
</select>


<br><br>
<select id="tipoPessoa" name="tipoPessoa">
	<option value="default">Pessoa..</option>
	<?php if($doador->tipoPessoa == 'fisica'){ ?>
	<option value="fisica" selected>Pessoa Fisica</option>
	<?php }else{ ?>
	<option value="fisica">Pessoa Fisica</option>
	<?php }if($doador->tipoPessoa == 'juridica'){ ?>
	<option value="juridica" selected>Pessoa Jurídica</option>
	<?php } else { ?>
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

<script type="text/javascript">
	
	var tC = document.getElementById('tipoCliente');

	tC.addEventListener("change",function(){
		val = tC.value;

		if(val == "fidelizado"){
			document.getElementById('dia').style.display = "inline";
		} else {
			document.getElementById('dia').style.display = "none";
			document.getElementById('dia').value = "default";
		}

		if(val == "anual"){
			document.getElementById('mes').style.display = "inline";
		} else {
			document.getElementById('mes').style.display = "none";
			document.getElementById('mes').value = "default";
		}
	});

	val = tC.value;

		if(val == "fidelizado"){
			document.getElementById('dia').style.display = "inline";
		} else {
			document.getElementById('dia').style.display = "none";
			document.getElementById('dia').value = "default"
		}

		if(val == "anual"){
			document.getElementById('mes').style.display = "inline";
		} else {
			document.getElementById('mes').style.display = "none";
			document.getElementById('mes').value = "default";
		}

</script>
</body>
</html>