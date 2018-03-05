<?php

if(isset($_GET["id"]) == true){
	require_once("conexao.php");

	$id = $_GET["id"];

	$con = conexaoMysql();

	$validar = $con->prepare("SELECT * FROM tipoDoacao WHERE id_tipoDoacao=:id");
	$validar->bindValue(':id',$id);
	$validar->execute();

	$retorno = $validar->fetch(PDO::FETCH_OBJ);

	$nome = 'VictorAssis';
	$o1 = 'asds';
	$o2 = 'asdasf';

	echo "Nome na validacao: " . $retorno->nome;

	if($nome != $retorno->nome){

		if($validar->rowCount() < 1){
			echo "Registro inexistente";
		} else{

			$query = $con->prepare("UPDATE tipoDoacao SET nome=:nome, off=:o1, off3=:o2 WHERE id_tipoDoacao=:id");
			$query->bindValue(':nome',$nome);
			$query->bindValue(':o1',$o1);
			$query->bindValue(':o2',$o2);
			$query->bindValue(':id',$id);

			$query->execute();

			if($query->rowCount() > 0){
				echo "Alterado com sucesso!";
			} else{
				echo "Não foi possivel alterar.";
			}

		}

	} else{
		echo "<h1>Nome já existente!</h1>";
	}

	$con = null;
}

echo "<a href=\"index.php\" title=\"Voltar\">Voltar</a>";
?>