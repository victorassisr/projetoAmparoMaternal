<!DOCTYPE html>
<html>
<head>
	<title>Gerência de Doadores</title>
	<link rel="stylesheet" type="text/css" href="../geral/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../geral/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../geral/css/myStyle.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="../geral/js/angular-1.6.9.min.js"></script>
</head>
<body>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="#" title="Amparo Maternal Euripedes Novelino"><div id="logo"></div></a>

		<span id="nome">Amparo Maternal Euripedes Novelino</span>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="../inicio/index2.php">Início</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle ativo" href="#" id="dropdownDoador" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Doador<span class="sr-only">(current)</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="cadastrar.php">Cadastrar</a>
					<a class="dropdown-item" href="listar.php">Listar</a>
					<a class="dropdown-item dropdown-ativo-bt" href="buscar.php">Buscar</a>
				</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../campanha/">Campanhas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Despesas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Relatórios</a>
				</li>
			</ul>
		</div>
	</nav>

	<div ng-app="buscaDoador" ng-controller="buscaDoadorCtrl">
		<p>O que deseja buscar?</p>
		<form ng-submit="buscarDoador()">
			<input type="text" name="parametro" placeholder="Pesquisar" id="parametro" ng-model="parametros.pesquisa"><label id="labelData">Ou pesquise por data: </label><input type="date" name="data" id="data" ng-model="data">
			<select name="tipo" id="filtro" ng-value="parametros.tipoDeBusca" ng-model="parametros.tipoDeBusca">
					<option ng-model="parametros.tipoDeBusca" ng-repeat="busca in buscas track by $index">{{busca.tipoBusca}}</option>
			</select>
			<input type="submit" name="Enviar" value="Buscar">
		</form>
	</div>

	<?php include("rodape_doador.php"); ?>

<script type="text/javascript" src="../geral/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../geral/js/popper.min.js"></script>
<script type="text/javascript" src="../geral/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/buscar.js"></script>
</body>
</html>