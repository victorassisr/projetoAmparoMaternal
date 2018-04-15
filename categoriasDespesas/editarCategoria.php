<?php

require_once("conexao.php");

$con = conexaoMysql();

$sql = "SELECT nome FROM categoriasDespesa WHERE id = :id";

$id = $_GET['id'];

$busca = $con->prepare($sql);

$busca->bindValue(":id",$id);
$busca->execute();

$categoria = $busca->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar categoria despesa</title>
</head>
<body>
<form action="updateCategoria.php" method="post">
	<input type="text" name="catDesp" placeholder="Nome da Categoria" value="<?php echo $categoria->nome; ?>">
	<input type="hidden" name="idCategoria" value="<?php echo $id; ?>">
	<br><br>
	<input type="submit" value="Atualizar">
</form>
</body>
</html>