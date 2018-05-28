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
					<a class="dropdown-item dropdown-ativo-bt-bb" href="listar.php">Listar</a>
					<a class="dropdown-item" href="buscar.php">Buscar</a>
				</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Campanhas</a>
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

	<!-- Conteudo -->
	<section ng-app="listarDoadores" ng-controller="controladorListarDoadores">
		<h2 class="titulo text-center">Doadores</h2>
		<div class="text-center"><span class="erro">{{erro}}</span></div>
		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between align-items-center" ng-repeat="doador in doadores track by $index">
				{{doador.nome}}
				<div class="acoesDoador">
					<a class="badge badge-primary badge-pill" href="editar.php?id={{doador.id_doador}}" title="Editar o doador {{doador.nome}}">Editar</a>
					<a class="badge badge-primary badge-pill" href="excluir.php?id={{doador.id_doador}}" title="Excluir o doador {{doador.nome}}">Excluir</a>
					<a class="badge badge-primary badge-pill" href="recibo.php?id={{doador.id_doador}}" title="Gerar Recibo para {{doador.nome}}">Recibo</a>
					<a class="badge badge-primary badge-pill" href="informacoes.php?id={{doador.id_doador}}" title="Informações sobre o doador {{doador.nome}}">Informações</a>
				</div>
			</li>
		</ul>
	</section>


	<footer class="container-fluid">
		<p>AMPARO MATERNAL - EURÍPEDES NOVELINO &copy; - <?php date_default_timezone_set("America/Sao_Paulo"); echo date('Y');?></p>
	</footer>

<script type="text/javascript" src="../geral/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../geral/js/popper.min.js"></script>
<script type="text/javascript" src="../geral/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/listar.js"></script>
</body>
</html>