<?php

require_once('conexao.php');

$con = conexaoMysql();

	if($_POST['nomeCampanha'] != ""){
		$nome = $_POST['nomeCampanha'];

		if($_POST['dataInicial'] == ""){
			$dataInicial = "00-00-0000";
		} else {
			$dataInicial = $_POST['dataInicial'];
		}

		if($_POST['dataFinal'] == ""){
			$dataFinal = "00-00-0000";
		} else {
			$dataFinal = $_POST['dataFinal'];
		}

		$sql = "SELECT nomeCampanha FROM campanhas WHERE nomeCampanha = :nome";
		$valida = $con->prepare($sql);
		$valida->bindValue(':nome',$nome);
		$valida->execute();

		if($valida->rowCount() == 0){
			$sql = "INSERT INTO campanhas (nomeCampanha,dataInicial,dataFinal) VALUES (:nome,:dataInicial,:dataFinal)";
			$cadastra = $con->prepare($sql);
			$cadastra->bindValue(':nome',$nome);
			$cadastra->bindValue(':dataInicial',$dataInicial);
			$cadastra->bindValue(':dataFinal',$dataFinal);

			$cadastra->execute();

			if($cadastra->rowCount() == 1){
				echo "Cadastrou: " . $cadastra->rowCount();
				echo "<br><br><a href=\"http://10.0.0.50/\">Voltar</a>";
			} else {
				echo "Houve um erro ao cadastrar!";
				echo "<br><br><a href=\"http://10.0.0.50/\">Voltar</a>";
			}
		} else {
			echo "O nome já existe cadastrado!";
			echo "<br><br><a href=\"http://10.0.0.50/\">Voltar</a>";
		}

	} else {
		echo "A campanha deve ter pelo menos um nome.";
		echo "<br><br><a href=\"http://10.0.0.50/\">Voltar</a>";
	}

?>