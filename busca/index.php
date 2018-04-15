<?php

	require_once('conexao.php');

	$con = conexaoMysql();

	$sql = "SELECT * FROM tiposBusca";

	$busca = $con->prepare($sql);

	$busca->execute();

	$tiposBusca = $busca->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Buscar</title>
</head>
<body>
	<p>O que deseja buscar?</p>
	<form action="busca.php" method="post">
		<input type="text" name="parametro" placeholder="Parametros" id="parametro"><label id="labelData">Selecione uma data: </label><input type="date" name="data" id="data">
		<select name="tipo">
			<?php foreach($tiposBusca as $tipoBusca){ ?>
				<option value="<?php echo $tipoBusca->idTipoBusca; ?>"><?php echo $tipoBusca->tipoBusca; ?></option>
			<?php } ?>
		</select>
		<input type="submit" name="Enviar" value="Buscar">
	</form>
	<script type="text/javascript">
		var parametro = document.getElementById('parametro');
		var data = document.getElementById('data');


		window.addEventListener("click",function(){
			if(data.value != ""){
				parametro.style.display = "none";
			} else {
				parametro.style.display = "inline";
			}
		});

		parametro.addEventListener("keyup",function(){
			var labelData = document.getElementById('labelData');
			var campoData = document.getElementById('data');
			if(parametro.value != ""){
				labelData.style.display = "none";
				campoData.style.display = "none";
			} else {
				labelData.style.display = "inline";
				campoData.style.display = "inline";
			}
		});
	</script>
</body>
</html>