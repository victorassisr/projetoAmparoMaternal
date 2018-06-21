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
?>
<div class="container">	
<?php
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
	<h2 class="titulo">Doacões de <?php echo $doador->nome ?></h2>
			<table class="table table-hover table-white table-responsive-xm">
			  <thead>
			    <tr>
			    	<th scope="col">Data</th>
		    	 	<th scope="col">Tipo de Doação</th>
		    	 	<th scope="col">Campanha</th>
		    	 	<th scope="col">Item</th>
		    	 	<th scope="col">Quantidade</th>
		    	 	<th scope="col">Tipo (dinheiro)</th>
		    	 	<th scope="col">Valor</th>
		    	 	<th scope="col">Editar</th>
		    	</tr>
		 	  </thead>
		  	  <tbody>
	
	<?php
	foreach($doacoes as $doacao){
		//Busca tipo de Doação
	$sql = "SELECT nome FROM tipoDoacao WHERE id_tipoDoacao = :id";
	$busca = $con->prepare($sql);
	$busca->bindValue(':id',$doacao->id_tipoDoacao);
	$busca->execute();
	$tipoDoacao = $busca->fetch(PDO::FETCH_OBJ);
	?>
				<tr>
		      		<th scope="row"><?php echo date("d/m/Y", strtotime($doacao->dataDoacao)); ?></td> <!--DATA -->
		      		<th><?php echo $tipoDoacao->nome; ?></th> <!--TIPO DOACAO -->
		      		<?php
						//Busca Campanhas
						$sql = "SELECT nomeCampanha FROM campanhas WHERE id_campanha = :id";
						$busca = $con->prepare($sql);
						$busca->bindValue(':id',$doacao->id_campanha);
						$busca->execute();
						$campanha = $busca->fetch(PDO::FETCH_OBJ);
					?>
		      		<th scope="row"><?php echo $campanha->nomeCampanha; ?></th>  <!--CAMPANHA -->
		      		<th scope="row"><?php echo $doacao->item_doacao; ?></th> <!--ITEM -->
		      		<th scope="row"><?php echo $doacao->quantidade; ?></th> <!--QUANTIDADE -->
		      		<?php
						//Busca tipo de Doação em dinheiro
						$sql = "SELECT tipo FROM tipoDoacaoDinheiro WHERE idTipoDinheiro = :id";
						$busca = $con->prepare($sql);
						$busca->bindValue(':id',$doacao->tipoDinheiro);
						$busca->execute();
						$tipoDinheiro = $busca->fetch(PDO::FETCH_OBJ);
					?>
					<th scope="row"><?php echo $tipoDinheiro->tipo ?></th> <!--TIPO -->
		      		<th scope="row">R$<?php echo $doacao->valorDinheiro; ?>,<?php echo $doacao->valorCentavos; ?></th>  <!--VALOR -->
		      		<th scope="row"><a href="editarDoacao.php?id=<?php echo $doacao->id_doacao; ?>"><i class="material-icons">edit</i></a></th> <!-- EDIT -->
		    	</tr>
	<?php } //Fim do foreach ?>

<?php } else { ?>
		<h1>Você precisa especificar um doador válido!</h1>

<?php
	}}
?>
		</tbody>
	</table>
</div>

<?php include ("rodape.php"); ?>

</body>
</html>