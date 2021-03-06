<!DOCTYPE html>
<html>
<head>
	<noscript>
		<meta http-equiv="Refresh" content="0;url=https://10.0.0.50/projetoAmparoMaternal/index.php?erro=nojs">
	</noscript>
	<meta charset="utf-8">
	<title>Doações do Doador</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../geral/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../geral/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../geral/css/myStyle.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="../geral/js/angular-1.6.9.min.js"></script>
</head>
<body>
<?php
	include("menu.html");

	if(isset($_GET['pag']) && $_GET['pag'] == 'doador' && isset($_GET['id']) && $_GET['id'] != ""){
		$id_doador = $_GET['id'];

	require_once('conexao.php');
	$con = conexaoMysql();

	//Busca Doador
	$sql = "SELECT id_doador, nome FROM doador WHERE id_doador = :id_doador";
	$busca = $con->prepare($sql);
	$busca->bindValue(':id_doador',$id_doador);
	$busca->execute();
	if($busca->rowCount() == 1){
		$doador = $busca->fetch(PDO::FETCH_OBJ);

		//Doaçoes
		$sql = "SELECT * FROM doacao WHERE id_doador = :idDoador";
		$busca = $con->prepare($sql);
		$busca->bindValue(':idDoador',$id_doador);
		$busca->execute();
		$doacoes = $busca->fetchAll(PDO::FETCH_OBJ);
?>

	<h2 class="titulo">Doacões de <?php echo $doador->nome; ?></h2>
	<?php
	foreach($doacoes as $doacao){
		//Busca tipo de Doação
	$sql = "SELECT nome FROM tipoDoacao WHERE id_tipoDoacao = :id";
	$busca = $con->prepare($sql);
	$busca->bindValue(':id',$doacao->id_tipoDoacao);
	$busca->execute();
	$tipoDoacao = $busca->fetch(PDO::FETCH_OBJ);
	?>
	<p>Tipo da doação: <?php echo $tipoDoacao->nome; ?></p>

	<p>Item doado: <?php echo $doacao->item_doacao; ?></p>

	<p>Data da doação: <input type="date" value="<?php echo $doacao->dataDoacao; ?>" readonly></p>

	<?php
		//Busca Campanhas
	$sql = "SELECT nomeCampanha FROM campanhas WHERE id_campanha = :id";
	$busca = $con->prepare($sql);
	$busca->bindValue(':id',$doacao->id_campanha);
	$busca->execute();
	$campanha = $busca->fetch(PDO::FETCH_OBJ);
	?>

	<p>Campanha: <?php echo $campanha->nomeCampanha; ?></p>

	<p>Quantidade de Itens doados: <?php echo $doacao->quantidade; ?></p>

	<p>Valor doado em dinheiro: R$<?php echo $doacao->valorDinheiro; ?>,<?php echo $doacao->valorCentavos; ?>.</p>

	<?php
		//Busca tipo de Doação em dinheiro
	$sql = "SELECT tipo FROM tipoDoacaoDinheiro WHERE idTipoDinheiro = :id";
	$busca = $con->prepare($sql);
	$busca->bindValue(':id',$doacao->tipoDinheiro);
	$busca->execute();
	$tipoDinheiro = $busca->fetch(PDO::FETCH_OBJ);
	?>

	<p>Tipo de doação em dinheiro: <?php echo $tipoDinheiro->tipo ?></p>

	<p><a href="editarDoacao.php?id=<?php echo $doacao->id_doacao; ?>">Editar Doacao</a></p>
	<hr>
	<?php } //Fim do foreach ?>
</body>
</html>

<?php } else { ?>
		<h1>Você precisa especificar um doador válido!</h1>


	<?php
}}

include ("rodape.php");
?>
	</body>
	</html>