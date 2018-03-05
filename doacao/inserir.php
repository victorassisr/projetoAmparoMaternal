<?php
if(isset($_POST["tipoDoacao"]) == true){
	require_once("conexao.php"); //Inclui o arquivo de conexão com o BD;

	$con = conexaoMysql();

	$validar = $con->prepare("SELECT * FROM tipoDoacao WHERE nome=:nome");
	$validar->bindValue(':nome',$_POST["tipoDoacao"]);
	$validar->execute();
	
if($validar->rowCount() < 1){

		$nome = $_POST["tipoDoacao"]; //Valor do input vindo do Form;
		$o1 = 12;//$_POST["o1"];
		$o2 = 34;//$_POST["o1"];

		$query = $con->prepare("INSERT INTO tipoDoacao(nome,off,off3) VALUES (:nome, :o1, :o2)");
		$query->bindValue(':nome',$nome);
		$query->bindValue(':o1',$o1);
		$query->bindValue(':o2',$o2);

		$query->execute();

		if($query->rowCount() > 0){
			echo "Inserido com sucesso!";
		} else{
			echo "Valores vazios. Corrija.";
		}
	} else{
		echo "Categoria já cadastrada..";
	}
}

echo "<a href=\"index.php\" title=\"Voltar\">Voltar</a>";
?>