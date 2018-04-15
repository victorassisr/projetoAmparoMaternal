<?php
	require_once('conexao.php');

	$sql = "SELECT * FROM categoriasDespesa";

	$con = conexaoMysql();

	$busca = $con->prepare($sql);

	$busca->execute();

	$categorias = $busca->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de despesas</title>
</head>
<body>

<h1>Cadastro de despesas</h1>

<form action="cadastrarDespesa.php" method="post">
	<fieldset>
		<legend>Cadastrar despesas</legend>
		<div><label>Despesa:</label><input type="text" name="infoDespesa"></div>
		<div>
			<select name="idCategoria">
				<option value="default">Categoria da Despesa</option>
				<?php foreach($categorias as $categoria){ ?>
					<option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nome; ?></option>
					<?php } ?>
			</select>
		</div>
		<div><label>Valor: </label><input type="text" name="reais">,<input type="number" name="centavos" maxlength="2"></div>
		<div><label>Data da despesa: </label><input type="date" name="dataDespesa"></div>
		<input type="submit" value="Cadastrar">
	</fieldset>
</form>
</body>
</html>