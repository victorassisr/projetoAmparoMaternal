<?php

require_once("conexao.php");

$sql = "SELECT * FROM categoriasDespesa";

$con = conexaoMysql();

$busca = $con->prepare($sql);

$busca->execute();

$categorias = $busca->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Categorias de despesas</title>
</head>
<body>
<?php foreach($categorias as $categoria){

if($categoria->nome == "Nenhuma"){ ?>
<p>Categoria: <?php echo $categoria->nome; ?></p>
<hr>
<?php } else { ?>

<p>Categoria: <?php echo $categoria->nome; ?></p>
<p><a href="editarCategoria.php?id=<?php echo $categoria->id; ?>">Editar</a> ou <a href="excluirCategoria.php?id=<?php echo $categoria->id; ?>">Excluir</a></p> 
<hr>
<?php }} //Fim do foreach $categorias ?>
</body>
</html>