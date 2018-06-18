<?php 
	require_once("conexao.php");

	$con = conexaoMysql();

	$sql = "SELECT * FROM opcoesRelatorio";

	$busca = $con->prepare($sql);

	$busca->execute();
	
	if($busca->rowCount() > 0){
		$opcoes = $busca->fetchAll(PDO::FETCH_OBJ);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Relatório de despesas</title>

</head>
<body>
	<form action="pesquisa.php" method="post">
		<div>
			Data inicial: <input type="date" name="dataInicial"> Data final: <input type="date" name="dataFinal">
			<select name="opcao">
				<?php
					foreach ($opcoes as $opcao)
					{ ?>
					 	<option value="<?php echo $opcao->nome; ?>">
					 		<?php
					 			echo $opcao->nome;
					 		?>
					 	</option>
					<?php } 
				?>
			</select>
		</div>
		<div>
			<button type="submit">Pesquisar</button>
		</div>
	</form>
</body>
</html>