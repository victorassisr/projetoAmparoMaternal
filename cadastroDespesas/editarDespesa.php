<?php

if(isset($_GET['id']) == false && $_GET['id'] != ""){
	echo "<h1>Selecione uma despesa válida para ser editada!</h1>";
} else {
	require_once('conexao.php');
	$con = conexaoMysql();

$id = $_GET['id'];

$sql = "SELECT * FROM despesas WHERE idDespesa = :id";

$listar = $con->prepare($sql);
$listar->bindValue(':id',$id);
$listar->execute();

if($listar->rowCount() > 0){

$despesa = $listar->fetch(PDO::FETCH_OBJ);

$sql = "SELECT * FROM categoriasDespesa";
$busca = $con->prepare($sql);
$busca->execute();

$categorias = $busca->fetchAll(PDO::FETCH_OBJ);

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar de despesas</title>
</head>
<body>

<h1>Edição de despesas</h1>

<form action="updateDespesa.php" method="post">
	<fieldset>
		<legend>Editar despesas</legend>
		<div><label>Despesa:</label><textarea cols="10" rows="10" name="infoDespesa"><?php echo $despesa->infoDespesa; ?></textarea></div>
		<div>
			<select name="categoriaDespesa">
				<option value="default">Categoria da Despesa</option>
				<?php foreach($categorias as $categoria){
					if($categoria->id == $despesa->idCategoria){ ?>
					<option value="<?php echo $categoria->id; ?>" selected><?php echo $categoria->nome; ?></option>
					<?php } else {?>
					<option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nome; ?></option>
					<?php }} ?>
			</select>
		</div>
		<div><label>Valor: </label><input type="text" name="reais" value="<?php echo $despesa->reais; ?>">,<input type="number" name="centavos" maxlength="2" value="<?php echo $despesa->centavos; ?>"></div>
		<div><label>Data da despesa: </label><input type="date" name="dataDespesa" value="<?php echo $despesa->data; ?>"></div>
		<input type="hidden" name="idDespesa" value="<?php echo $despesa->idDespesa;?>">
		<input type="submit" value="Cadastrar">
	</fieldset>
</form>
</body>
</html>

<?php
	}
?>