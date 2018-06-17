<?php

	require_once('conexao.php'); //Inclui o arquivo de conexão aqui nessa página. Se não existir da erro e para a execução do restante do script.

	$con = conexaoMysql(); //Do arquivo de conexão tem uma funcção q retorna a conexão com o banco de dados.
	//Nesse caso estamos atribuindo a conexão a variável $con.

	$sql = "SELECT * FROM tiposBusca"; //Consulta SQL Selecionar tudo da tabela tiposBusca.

	$busca = $con->prepare($sql); //Prepara a query.. PDO, pra evitar injeções SQL.

	$busca->execute(); //Executa a consulta.

	$tiposBusca = $busca->fetchAll(PDO::FETCH_OBJ); //Retorna todos os tipos de busca em um OBJETO.
//Pagina HTML...
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Buscar</title>
	<script type="text/javascript" src="../geral/js/angular-1.6.9.min.js"></script>
</head>
<body>
	<div ng-app="buscaDoador" ng-controller="buscaDoadorCtrl">
		<p>O que deseja buscar?</p>
		<form action="busca.php" method="post">
			<input type="text" name="parametro" placeholder="Parametros" id="parametro"><label id="labelData">Selecione uma data: </label><input type="date" name="data" id="data">
			<select name="tipo" id="filtro">
				<?php //FOREACH pega cada elemento e trata ele separado. Listando um a um o tipo de busca. ?>
				<?php foreach($tiposBusca as $tipoBusca){ ?>
					<option value="<?php echo $tipoBusca->tipoBusca; ?>"><?php echo $tipoBusca->tipoBusca; ?></option>
				<?php } ?>
			</select>
			<input type="submit" name="Enviar" value="Buscar">
		</form>
	</div>
	<script type="text/javascript" src="js/busca.js"></script>
</body>
</html>