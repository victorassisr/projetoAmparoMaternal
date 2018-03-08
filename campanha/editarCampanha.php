<?php

	if(isset($_GET['id']) && $_GET['id'] != ""){

		$id = $_GET['id'];

		require_once('conexao.php');

		$con = conexaoMysql();

		$sql = "SELECT * FROM campanhas WHERE id_campanha = :id";

		$listar = $con->prepare($sql);

		$listar->bindValue(':id',$id);

		$listar->execute();

		if($listar->rowCount() == 1){

		$campanha = $listar->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Campanha</title>
</head>
<body>
	<form action="updateCampanha.php" method="post">
		<label for="campanha">Nome da Campanha</label>
		<input type="text" name="nomeCampanha" id="nomeCampanha" value="<?php echo $campanha->nomeCampanha; ?>" required>

		<br><br>

		<label for="campanha">Data de Inicio</label>
		<input type="date" name="dataInicial" id="dataInicial" value="<?php echo $campanha->dataInicial; ?>" >

		<br><br>

		<label for="campanha">Nome de Término</label>
		<input type="date" name="dataFinal" id="dataFinal" value="<?php echo $campanha->dataFinal; ?>" >

		<br><br>

		<input type="hidden" name="id" value="<?php echo $campanha->id_campanha; ?>">

		<input type="submit" value="Editar" />
	</form>

</body>
</html>

<?php 

		} else{
			echo "Voce deve selecionar um elemento válido para ser editado!";
			echo "<a href=\"listarCampanhas.php\">Voltar</a>";
		}
	} else {
		echo "Voce deve selecionar um elemento válido para ser editado!";
		echo "<a href=\"listarCampanhas.php\">Voltar</a>";
	}