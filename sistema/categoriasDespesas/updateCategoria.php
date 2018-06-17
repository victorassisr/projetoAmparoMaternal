<?php

require_once("conexao.php");

$categoria = $_POST['catDesp'];
$id = $_POST['idCategoria'];

$sql = "UPDATE categoriasDespesa SET nome=:categoria WHERE id=:id";

$con = conexaoMysql();


$inserir = $con->prepare($sql);

$inserir->bindValue(":categoria",$categoria);
$inserir->bindValue(":id",$id);

$sqlValidacao = "SELECT nome FROM categoriasDespesa WHERE nome = :categoria";

$validacao = $con->prepare($sqlValidacao);
$validacao->bindValue(":categoria",$categoria);
$validacao->execute();

if($validacao->rowCount() == 0){

	$inserir->execute();

	if($inserir->rowCount() > 0){
		echo "Atualizado!";
	} else {
		echo "Nao atualizado!";
	}
} else {
	echo "Categoria já existe!";
}
?>