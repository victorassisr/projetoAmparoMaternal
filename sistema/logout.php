<?php
session_start();
	session_destroy();
	unset($_SESSION["logado"]);
	if(!isset($_SESSION["logado"])){
		header("location:http://localhost/projetoAmparoMaternal/site/admin/index.php");
		exit;
	}
?>