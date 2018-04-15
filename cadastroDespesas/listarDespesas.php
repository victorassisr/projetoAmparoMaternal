<?php
require_once('conexao.php');

$con = conexaoMysql();

$sql = "SELECT * FROM despesas";

$listar = $con->prepare($sql);

$listar->execute();

if($listar->rowCount() > 0){

$despesas = $listar->fetchAll(PDO::FETCH_OBJ);

//Buscar Categorias de despesas:
$sql = "SELECT * FROM categoriasDespesa";
$listar = $con->prepare($sql);
$listar->execute();
$categorias = $listar->fetchAll(PDO::FETCH_OBJ);

foreach ($despesas as $despesa) {
			$categoriaAtual = "";
			foreach ($categorias as $categoria) {
				if($categoria->id == $despesa->idCategoria){
					$categoriaAtual = $categoria->nome;
				}
			}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Despesas Lista</title>
	</head>
	<body>
		<p>Info despesa: <?php echo $despesa->infoDespesa; ?></p>
		<p>Categoria: <?php echo $categoriaAtual; ?></p>
		<p>Data da despesa: <?php echo $despesa->data; ?></p>
		<p>Valor despesa: <?php echo $despesa->reais . "," . $despesa->centavos; ?></p>
		<p><a href="editarDespesa.php?id=<?php echo $despesa->idDespesa; ?>">Editar</a> ou <a href="excluirDespesa.php?id=<?php echo $despesa->idDespesa; ?>">Excluir</a></p>
		<hr>
	</body>
	</html>
	<?php
	}
} else {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Listar Despesas</title>
	</head>
	<body>
	<h1>Nada cadastrado ainda.</h1>
	</body>
	</html>
	<?php
}