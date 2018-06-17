<?php
session_start();

	if(!isset($_SESSION["logado"])){
		header("location:http://localhost/projetoAmparoMaternal/site/admin/");
		exit;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
	<a href="logout.php" title="Sair..">Sair</a>
</body>
</html>