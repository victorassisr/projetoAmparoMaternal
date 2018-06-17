<?php
	if(isset($_SESSION["logado"])){
		header("location:http://localhost/projetoAmparoMaternal/sistema/");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="login.php" method="POST">
	<div>
		<label>Usuario:</label>
		<input type="text" name="usuario">
	</div>
	<div>
		<label>Senha:</label>
		<input type="password" name="senha">
	</div>
	<?php if(isset($_GET["erro"]) && $_GET["erro"] == 1){ ?>
		<div>
			<span>Nome de usuário inexistente.</span>
		</div>
	<?php } ?>
	<?php if(isset($_GET["erro"]) && $_GET["erro"] == 2){ ?>
		<div>
			<span>Nome de usuário não pode ficar em branco!</span>
		</div>
	<?php } ?>
	<?php if(isset($_GET["erro"]) && $_GET["erro"] == 3){ ?>
		<div>
			<span>Senha não pode ficar em branco!</span>
		</div>
	<?php } ?>
	<div>
		<input type="submit" name="Enviar" value="Login">
	</div>
</form>
</body>
</html>