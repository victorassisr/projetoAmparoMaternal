<?php

require_once('conexao.php');

$con = conexaoMysql();

$sql = "SELECT * FROM campanhas";

$listar = $con->prepare($sql);

$listar->execute();

$campanhas = $listar->fetchAll(PDO::FETCH_OBJ);

foreach($campanhas as $campanha){
	if($campanha->nomeCampanha == "Nenhuma"){
		echo "<p>" . $campanha->nomeCampanha . "</p>";
		echo "<p>" . $campanha->dataInicial . "</p>";
		echo "<p>" . $campanha->dataFinal . "</p>";
		echo "=================================================";
	} else {
		echo "<p>" . $campanha->nomeCampanha . "</p>";
		echo "<p>" . $campanha->dataInicial . "</p>";
		echo "<p>" . $campanha->dataFinal . "</p>";

	echo "<a href=\"editarCampanha.php?id=".$campanha->id_campanha."\">Editar | </a>";
	echo "<a href=\"excluirCampanha.php?id=".$campanha->id_campanha."\">Exluir</a>";
	echo "<br><br>=================================================";
	}
}