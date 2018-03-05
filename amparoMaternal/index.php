<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Amparo Maternal - Eurípedes Novelino</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<nav>
		<div class="topo1">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-4">
	  					<a class="logo" href="#" onclick="menuT()">Amparo Maternal</a>
	  				</div>
	  				<div class="col-xs-7 ml-auto">
	  					<a class="link-topo" href="#">Link1</a>
	  					<a class="link-topo" href="#">Link2</a>
	  					<a class="link-topo" href="#">Link3</a>
	  				</div>
	  				<!--Botao Toogler-->
	  				<div class="toogler col-xs-1 navbar-light">
	  					<button class="navbar-toggler" type="button" onclick="menuToggle();">
    						<span class="navbar-toggler-icon" onclick="menuT();"></span>
  						</button>
	  				</div>
	  			</div>
	  		</div>
		</div>

		<div class="container-fuid menu" id="menu-bar">
			<ul class="barra-menu">
				<li class="menu-item">Link1</li>
				<li class="menu-item">Link2</li>
				<li class="menu-item">Link3</li>
				<li class="menu-item">Link4</li>
				<li class="menu-item">Link5</li>
			</ul>
		</div>
	</nav>

	<!--Scripts Js-->
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/meuScript.js"></script>
</body>
</html>