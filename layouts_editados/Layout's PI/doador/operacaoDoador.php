<?php
if(isset($_GET["item"]) && $_GET["item"] != "" && $_GET["item"] == "top10"){

	require_once("conexao.php");

	$con = conexaoMysql();

	$sql = "SELECT nome FROM doador ORDER BY id_doador DESC LIMIT 0,10";

	$busca = $con->prepare($sql);

	$busca->execute();

	if($busca->rowCount() > 0){
		$dados = $busca->fetchAll(PDO::FETCH_OBJ);
		echo json_encode($dados);
	} else {
		echo "ExceptionErro : Houve um erro na solicitacão. Tente novamente. Erro: Falha ao buscar dados do Banco.";
	}
	
} else {
	echo "404 - Nada aqui, por enquanto. =(";
}
?>