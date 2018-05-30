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
				
				$resposta["resultado"] = "Campanha cadastrada com sucesso!";				
				echo json_encode($resposta);
			} else {
				$resposta["resultado"] = "Erro ao cadastrar!";
				echo json_encode($resposta);
			}
		} else {
			$resposta["resultado"] = "O nome ja esta cadastrado!";
			echo json_encode($resposta);
		}

	} else {
		$resposta["resultado"] = "O nome ja esta cadastrado!";
		echo json_encode($resposta);
	}
?>