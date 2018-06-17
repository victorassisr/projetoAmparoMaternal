<?php
require_once('conexao.php');

$con = conexaoMysql();

$sql = "INSERT INTO despesas(infoDespesa, idCategoria, reais, centavos, data) VALUES (:info, :idCategoria, :reais, :centavos, :data)";

$info = $_POST['infoDespesa'];
$reais = $_POST['reais'];
$centavos = $_POST['centavos'];
$data = $_POST['dataDespesa'];
$idCategoria = $_POST['idCategoria'];

$cadastro = $con->prepare($sql);
$cadastro->bindValue(':info',$info);
$cadastro->bindValue(':reais',$reais);
$cadastro->bindValue(':centavos',$centavos);
$cadastro->bindValue(':data',$data);
$cadastro->bindValue(':idCategoria',$idCategoria);
$cadastro->execute();

if($cadastro->rowCount() > 0){
	echo "<h1>Cadastrado</h1>";
	echo "<a href=\"index.php\">Voltar</a>";
} else {
	echo "NW";
	echo "<a href=\"index.php\">Voltar</a>";
}