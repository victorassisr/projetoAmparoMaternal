<?php

	$json = file_get_contents('php://input');

	$doador = json_decode($json);

	echo $doador;

	$erros = Array();
	$sucesso = Array();

	if($doador->nome == ""){
		$erros["erroNome"] = "Nome não pode ficar vazio.";
	}

	if(isset($erros) && $erros != null){
		echo json_encode($erros);
	} else {
		//Inserir no banco..
		require_once('conexao.php');

		$con = conexaoMySql();

		if($doador->dia != "0"){
			$dia = $doador->dia;
		} else {
			$dia = 0;
		}

		if($doador->mes != "Não definido"){
			$mes = $doador->mes;
		} else{
			$mes = "Não definido";
		}

		$sql = "INSERT INTO doador(nome, endereco, email, telefoneResidencial, celular1, celular2, nascimento, dataCadastro, tipoDoador, doaDia, doaMes, documento, tipoPessoa, operadora, turma) VALUES (:nome, :endereco, :email, :telRes, :cel1, :cel2, :nasc, :cad, :tipoCli, :doaDia, :doaMes, :doc, :tipoPessoa, :operadora, :turma)";

		$inserir = $con->prepare($sql);
		$inserir->bindValue(':nome',$doador->nome);
		$inserir->bindValue(':endereco',$doador->endereco);
		$inserir->bindValue(':email',$doador->email);
		$inserir->bindValue(':telRes',$doador->telefoneFixo);
		$inserir->bindValue(':cel1',$doador->celular);
		$inserir->bindValue(':cel2',$doador->celularOpcional);
		$inserir->bindValue(':nasc',$doador->dataDeNascimento);
		$inserir->bindValue(':cad',$doador->dataDeCadastro);
		$inserir->bindValue(':tipoCli',$doador->tipoDeDoador);
		$inserir->bindValue(':doaDia',$doador->dia);
		$inserir->bindValue(':doaMes',$doador->mes);
		$inserir->bindValue(':documento',$doador->documento);
		$inserir->bindValue(':tipoPessoa',$doador->pessoa);
		$inserir->bindValue(':operadora',$doador->operadora);
		$inserir->bindValue(':turma',$doador->turma);

		$inserir->execute();

		$con = null;
		
		if($inserir->rowCount() > 0){
			$sucesso["sucesso"] = "Sucesso";
			echo json_encode($sucesso);
		} else {
			$erroBanco["erroBanco"] = "Houve um erro ao inserir no banco de dados. Contate o administrador.";
			echo json_encode($erroBanco);
		}
		//Fim insercao
	}

?>