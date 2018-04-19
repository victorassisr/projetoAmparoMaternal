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
</head>
<body>
	<p>O que deseja buscar?</p>
	<form action="busca.php" method="post">
		<input type="text" name="parametro" placeholder="Parametros" id="parametro"><label id="labelData">Selecione uma data: </label><input type="date" name="data" id="data">
		<select name="tipo" id="filtro">
			<?php //FOREACH pega cada elemento e trata ele separado. Listando um a um o tipo de busca. ?>
			<?php foreach($tiposBusca as $tipoBusca){ ?>
				<option value="<?php echo $tipoBusca->idTipoBusca; ?>"><?php echo $tipoBusca->tipoBusca; ?></option>
			<?php } ?>
		</select>
		<input type="submit" name="Enviar" value="Buscar">
	</form>
	<script type="text/javascript">
		var parametro = document.getElementById('parametro');
		var data = document.getElementById('data');
		var filtro = document.getElementById('filtro');

		data.addEventListener("change",function(){  //Se mudar a data..
			if(data.value != ""){ //Se a data for diferente de uma string vazia..
				parametro.style.display = "none"; //Oculta o parametro.
			} else { //Senão
				parametro.style.display = "inline"; //Mostra o campo parametro.
			}
		});

		parametro.addEventListener("keyup",function(){ //Se diigitar algo no parametro
			var labelData = document.getElementById('labelData');
			var campoData = document.getElementById('data');
			if(parametro.value != ""){ //Se o parametro for diferente a uma string vazia
				labelData.style.display = "none"; //Oculta label da data
				campoData.style.display = "none"; //Oculta data.
			} else { //Caso contrário
				labelData.style.display = "inline"; //Mostra label data
				campoData.style.display = "inline"; //Mostra campo data.
			}
		});

		filtro.addEventListener("change",function(){ //Se alterar o filtro

			if(filtro.value == "2"){ //Se o valor do filtro for igual a 2 (Procura por data de doacoes)
				parametro.style.display = "none"; //Oculta o parametro
			} else { //Caso contrário
				parametro.style.display = "inline"; //Mostra o campo parametro
			}
		});
	</script>
</body>
</html>