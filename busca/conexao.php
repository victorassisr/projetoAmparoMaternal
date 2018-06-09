<?php

function conexaoMysql(){ //Funcção de conexão com o banco
	$conexao; //variavel de conexao

		$usuario = 'root'; //Usuario
		$pass = 'fepam'; //Senha do banco


	try{ //Tente
		$conexao = new PDO('mysql:host=localhost;dbname=amparoMaternal;', $usuario, $pass); //Criar conexão com o banco
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Seta conexão pro modo exceção
		return $conexao; //Retorna a conexão.
    }
	catch(PDOException $e) //Erro
   	{
    	echo "Connection failed: " . $e->getMessage(); //Mostra a mensagem de erro.
    }
}
?>