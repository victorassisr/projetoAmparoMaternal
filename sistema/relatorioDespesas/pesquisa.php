<?php 

if(isset($_POST["dataInicial"]) && isset($_POST["dataFinal"]) && isset($_POST["opcao"]) && $_POST["dataInicial"] != "" && $_POST["dataFinal"] != "" && $_POST["opcao"] != ""){
	require_once("conexao.php");

	$con = conexaoMysql();

	$di = $_POST["dataInicial"];

	$df = $_POST["dataFinal"];

	$op = $_POST["opcao"];

	$total = 0;


	//DESPESAS
	if($op == "DESPESAS")
	{
		$sql = "SELECT * FROM despesas WHERE data >= '$di' AND data <= '$df' ";

		$busca = $con->prepare($sql);

		$busca->execute();

		if($busca->rowCount() > 0){
			$despesas = $busca->fetchAll(PDO::FETCH_OBJ);

			foreach($despesas as $despesa){
				(double)$valor = $despesa->reais . "." . $despesa->centavos;
				$total += $valor;
			} //Soma dos valores das despesas.
		} else {
			$erro =  "Nada encontrado com os parâmetros inseridos";
		}
	}

	//DOACOES
	if($op == "DOACOES")
	{

		//Busca pela doacao
		$sql = "SELECT * FROM doacao WHERE dataDoacao >= '$di' AND dataDoacao <= '$df' ";

		$busca = $con->prepare($sql);

		$busca->execute();

		if($busca->rowCount() > 0){
			$doacoes = $busca->fetchAll(PDO::FETCH_OBJ);
			//Busca campanhas
			$sqlCampanhas = "SELECT id_campanha, nomeCampanha FROM campanhas";
			$buscaCampanhas = $con->prepare($sqlCampanhas);
			$buscaCampanhas->execute();
			$campanhas = $buscaCampanhas->fetchAll(PDO::FETCH_OBJ);

			//Busca nome do doador
			$sqlDoadores = "SELECT id_doador, nome FROM doador";
			$buscaDoadores = $con->prepare($sqlDoadores);
			$buscaDoadores->execute();
			$doadores = $buscaDoadores->fetchAll(PDO::FETCH_OBJ);
			foreach($doacoes as $doacao){
				(double)$valor = $doacao->valorDinheiro . "." . $doacao->valorCentavos;
				$total += $valor;
			}
		} else {
			$erro =  "Nada encontrado com os parâmetros inseridos";
		}
	}

	//DESPESAS/DOACOES  (errado)
	/*if($op == "DESPESAS/DOACOES")
	{

		//Busca pela doacao
		$sql = "SELECT * FROM despesas
				INNER JOIN  doacao 
				WHERE dataDoacao >= '$di' = dataDoacao <= '$df' ";

		$busca = $con->prepare($sql);

		$busca->execute();

		if($busca->rowCount() > 0){
			$doacoes = $busca->fetchAll(PDO::FETCH_OBJ);
			$despesas = $busca->fetchAll(PDO::FETCH_OBJ);


			//Busca campanhas
			$sqlCampanhas = "SELECT id_campanha, nomeCampanha FROM campanhas";
			$buscaCampanhas = $con->prepare($sqlCampanhas);
			$buscaCampanhas->execute();
			$campanhas = $buscaCampanhas->fetchAll(PDO::FETCH_OBJ);

			//Busca nome do doador
			$sqlDoadores = "SELECT id_doador, nome FROM doador";
			$buscaDoadores = $con->prepare($sqlDoadores);
			$buscaDoadores->execute();
			$doadores = $buscaDoadores->fetchAll(PDO::FETCH_OBJ);
			foreach($doacoes as $doacao){
				(double)$valor = $doacao->valorDinheiro . "." . $doacao->valorCentavos;
				$total += $valor;
			}

			foreach($despesas as $despesa){
				(double)$valor = $despesa->reais . "." . $despesa->centavos;
				$total += $valor;
			} //Soma dos valores das despesas.
		} else {
			$erro =  "Nada encontrado com os parâmetros inseridos";
		}
	}*/



	if(isset($erro)){
		echo $erro;
	}

	if(isset($despesas)){
		//Começa a mostrar os resultados de despesas.
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Busca despesas por intervalo de data</title>
			<style type="text/css">
				*{
					margin: 0;
					padding: 0;
				}

				table{
					width: 100%;
				}

				table, tr, td{
					border: 1px solid black;
					border-collapse: collapse;
					padding: 7px;
				}

				.valorTotal{
					background: #333;
					color: #FFF;
					position: relative;
					padding: 7px;
					text-align: right;
					padding-right: 55px;
				}
				h2{
					text-align: center;
					text-transform: uppercase;
					margin-top: 3%;
					margin-bottom: 4%;
				}

				.barraTipo{
					background-color: #c2edb1;
					font-weight: bold;
				}

				.content{
					margin-left: 5%;
					margin-right: 5%;
				}

			</style>
		</head>
		<body>
			<h2>Busca por despesas</h2>
			<div class="content">
				<table>
					<tr class="barraTipo">
						<td>Descricao</td>
						<td>Valor</td>
						<td>Data</td>
					</tr>
					<?php foreach($despesas as $despesa){ ?>
					<tr>
						<td><?php echo $despesa->infoDespesa; ?></td>
						<td>R$ <?php echo $despesa->reais; ?>,<?php echo $despesa->centavos; ?></td>
						<td><input type="date" value="<?php echo $despesa->data; ?>" readonly /></td>
					</tr>
					<?php } ?>	
				</table>
				<div class="valorTotal"><p>Total R$: <?php echo $total; ?></p></div>
			</div>
		</body>
		</html>
				<?php
	} //Fim do if despesas

	if(isset($doacoes)){
		//Começa a mostrar os resultados de doações
		?>
		<!DOCTYPE html>
		<html>
		<head
			<meta charset="utf-8">
			<title>Busca doações por intervalo de data</title>
			<style type="text/css">
				*{
					margin: 0;
					padding: 0;
				}

				table{
					width: 100%;
				}

				table, tr, td{
					border: 1px solid black;
					border-collapse: collapse;
					padding: 7px;
				}

				tr{
					width: 33%;
				}

				.valorTotal{
					background: #333;
					color: #FFF;
					position: relative;
					padding: 7px;
					text-align: right;
					padding-right: 55px;
				}
				h2{
					text-align: center;
					text-transform: uppercase;
					margin-top: 3%;
					margin-bottom: 4%;
				}

				.barraTipo{
					background-color: #c2edb1;
					font-weight: bold;
				}

				.content{
					margin-left: 5%;
					margin-right: 5%;
				}

			</style>
		</head>
		<body>
			<h2>Busca por doações</h2>
			<div class="content">
				<table>
					<tr class="barraTipo">
						<td>Item</td>
						<td>Campanha</td>
						<td>Doador</td>
						<td>Data</td>
						<td>Quantidade</td>
						<td>Valor</td>
					</tr>
						<?php foreach($doacoes as $doacao){ ?>
					<tr>
						<td><?php  echo $doacao->item_doacao; ?></td>
						<?php  foreach($campanhas as $campanha){
							if($doacao->id_campanha == $campanha->id_campanha){
								$campanhaAtual = $campanha->nomeCampanha; 
							}
						} ?>
						<td><?php echo $campanhaAtual; ?></td>
						<?php foreach($doadores as $doador){
							 if($doacao->id_doador == $doador->id_doador){
								$doadorAtual = $doador->nome; 
							}
						} ?>
						<td><?php  echo $doadorAtual; ?></td>
						<td><?php echo $doacao->dataDoacao; ?></td>
						<td><?php echo $doacao->quantidade; ?></td>
						<td>R$ <?php  echo $doacao->valorDinheiro; ?>,<?php echo $doacao->valorCentavos; ?></td>
					</tr>
					<?php } ?>
				</table>
				<div class="valorTotal"><p>Total: R$ <?php echo $total; ?></p></div>
			</div>
		</body>
		</html>
	<?php
	} //fim do if doações

	///////////////////////////////////////////o de baixo ta igual o de cima

	/*if(isset($doacoes)){
		//Começa a mostrar os resultados de despesas e doações
		?>
		<!DOCTYPE html>
		<html>
		<head
			<meta charset="utf-8">
			<title>Busca despesas e doações por intervalo de data</title>
			<style type="text/css">
				*{
					margin: 0;
					padding: 0;
				}

				table{
					width: 100%;
				}

				table, tr, td{
					border: 1px solid black;
					border-collapse: collapse;
					padding: 7px;
				}

				tr{
					width: 33%;
				}

				.valorTotal{
					background: #333;
					color: #FFF;
					position: relative;
					padding: 7px;
					text-align: right;
					padding-right: 55px;
				}
				h2{
					text-align: center;
					text-transform: uppercase;
					margin-top: 3%;
					margin-bottom: 4%;
				}

				.barraTipo{
					background-color: #c2edb1;
					font-weight: bold;
				}

				.content{
					margin-left: 5%;
					margin-right: 5%;
				}

			</style>
		</head>
		<body>
			<h2>Busca por despesas e doações</h2>
			<div class="content">
				<table>
					<tr class="barraTipo">
						<td>Item</td>
						<td>Campanha</td>
						<td>Doador</td>
						<td>Data</td>
						<td>Quantidade</td>
						<td>Valor</td>
					</tr>
						<?php foreach($doacoes as $doacao){ ?>
					<tr>
						<td><?php  echo $doacao->item_doacao; ?></td>
						<?php  foreach($campanhas as $campanha){
							if($doacao->id_campanha == $campanha->id_campanha){
								$campanhaAtual = $campanha->nomeCampanha; 
							}
						} ?>
						<td><?php echo $campanhaAtual; ?></td>
						<?php foreach($doadores as $doador){
							 if($doacao->id_doador == $doador->id_doador){
								$doadorAtual = $doador->nome; 
							}
						} ?>
						<td><?php  echo $doadorAtual; ?></td>
						<td><?php echo $doacao->dataDoacao; ?></td>
						<td><?php echo $doacao->quantidade; ?></td>
						<td>R$ <?php  echo $doacao->valorDinheiro; ?>,<?php echo $doacao->valorCentavos; ?></td>
					</tr>
					<?php } ?>
				</table>
				<div class="valorTotal"><p>Total: R$ <?php echo $total; ?></p></div>
			</div>
		</body>
		</html>
	<?php
	} //fim do if despesas e doações*/
	

	} else {
		echo "Parametros obrigatórios não informados.";
	}
?>

