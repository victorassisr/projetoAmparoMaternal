<?php
require_once('conexao.php');

$con = conexaoMysql();

$id = $_POST['idDespesa'];
$idCategoria = $_POST['categoriaDespesa'];
$info = $_POST['infoDespesa'];
$reais = $_POST['reais'];
$centavos = $_POST['centavos'];
$data = $_POST['dataDespesa'];

$sql = "UPDATE despesas SET infoDespesa = :info, idCategoria = :idCategoria, reais = :reais, centavos = :centavos, data = :data WHERE idDespesa = :id";

$cadastro = $con->prepare($sql);
$cadastro->bindValue(':info',$info);
$cadastro->bindValue(':idCategoria',$idCategoria);
$cadastro->bindValue(':reais',$reais);
$cadastro->bindValue(':centavos',$centavos);
$cadastro->bindValue(':data',$data);
$cadastro->bindValue(':id',$id);
$cadastro->execute();

if($cadastro->rowCount() > 0){
	echo "<h1>Editado</h1>";
	echo "<a href=\"index.php\">Voltar</a>";
} else {
	echo "NW";
	echo "<a href=\"index.php\">Voltar</a>";
}