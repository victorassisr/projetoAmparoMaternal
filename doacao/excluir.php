<?php

	require_once("conexao.php");

	if(isset($_GET["id"]) == true){

	$id = $_GET["id"];

	$con = conexaoMysql();

	$validar = $con->prepare("SELECT id_tipoDoacao FROM tipoDoacao WHERE id_tipoDoacao = '$id'");

	$validar->execute();

	if($validar->rowCount() < 1){
		echo "Registro inexistente";
	} else{

		$query = $con->prepare("DELETE FROM tipoDoacao WHERE id_tipoDoacao=:id");
		$query->bindValue(':id',$id);
		$query->execute();

		if($query->rowCount() > 0){
			echo "Deletado com sucesso!";
		} else{
			echo "Não foi possivel deletar.";
		}

	}
} else{
	echo "Ops, algo de errado não está correto! =/";
}

echo "<a href=\"index.php\" title=\"Voltar\">Voltar</a>";
?>