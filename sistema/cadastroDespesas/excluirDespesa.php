<?php
require_once('conexao.php');

$con = conexaoMysql();

$id = $_GET['id'];

$sql = "SELECT * FROM despesas WHERE idDespesa = :id";

$listar = $con->prepare($sql);
$listar->bindValue(':id',$id);
$listar->execute();

if($listar->rowCount() > 0){

$sql = "DELETE FROM despesas WHERE idDespesa = :id";

$exclui = $con->prepare($sql);
$exclui->bindValue(':id',$id);
$exclui->execute();

	if($exclui->rowCount() > 0){
		echo "<h1>Excluido.</h1>";
		echo "<a href=\"index.php\">Voltar</a>";
	}
} else{
		echo "<h1>Nada a excuir.</h1>";
		echo "<a href=\"index.php\">Voltar</a>";
	}