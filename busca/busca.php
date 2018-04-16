<?php

if(isset($_POST['parametro']) && isset($_POST['tipo'])){

	$parametro = $_POST['parametro'];
	$tipo = $_POST['tipo'];

	$parametro = "%".$parametro."%";

	require_once('conexao.php');

	$con = conexaoMysql();

	if($tipo == "1"){

		if($parametro != "%%"){

			$sql = "SELECT * FROM doador WHERE nome LIKE :parametro OR endereco LIKE :parametro OR email LIKE :parametro OR telefoneResidencial LIKE :parametro OR celular1 LIKE :parametro OR celular2 LIKE :parametro OR nascimento LIKE :parametro OR dataCadastro LIKE :parametro OR tipoDoador LIKE :parametro OR doaDia LIKE :parametro OR doaMes LIKE :parametro OR tipoPessoa LIKE :parametro OR operadora LIKE :parametro OR turma LIKE :parametro";

			$busca = $con->prepare($sql);

			$busca->bindValue(':parametro',$parametro);

			$busca->execute();

			if($busca->rowCount() > 0){
				$doadores = $busca->fetchAll(PDO::FETCH_OBJ);
				echo "<pre>";
				print_r($doadores);
				echo "</pre>";
			} else {
				echo "<h1>Nada encontrado!</h1>";
			}
		} else {
			if($_POST['data'] != ""){
				$data = "%".$_POST['data']."%";


				$sql = "SELECT * FROM doador WHERE dataCadastro LIKE :parametro OR nascimento LIKE :parametro";

				$busca = $con->prepare($sql);

				$busca->bindValue(':parametro',$data);

				$busca->execute();

				if($busca->rowCount() > 0){
					$doadores = $busca->fetchAll(PDO::FETCH_OBJ);
					echo "<pre>";
					print_r($doadores);
					echo "</pre>";
				} else {
					echo "<h1>Nada encontrado!</h1>";
				}

			} else {
				echo "<h1>Nada encontrado!</h1>";
			}
		}

	}

	//Busca pela doacao

	if($tipo == "2"){


		if($_POST['data'] != ""){
			$data = "%".$_POST['data']."%";


			$sql = "SELECT * FROM doacao WHERE dataDoacao LIKE :parametro";

			$busca = $con->prepare($sql);

			$busca->bindValue(':parametro',$data);

			$busca->execute();

			if($busca->rowCount() > 0){
				$doacoes = $busca->fetchAll(PDO::FETCH_OBJ);
				foreach ($doacoes as $doacao) {
					$sql = "SELECT nome FROM doador WHERE id_doador = :idDoador";

					$busca = $con->prepare($sql);

					$busca->bindValue(':idDoador',$doacao->id_doador);

					$busca->execute();

					$doador = $busca->fetch(PDO::FETCH_OBJ);

					if($doacao->tipoDinheiro == 1){
						echo "<p>Doador: ".$doador->nome." Doou: ".$doacao->item_doacao." Na quantia de: ". $doacao->valorDinheiro.",". $doacao->valorCentavos ." Na data de: "."<input type=\"date\" name=\"data\" value='" . $doacao->dataDoacao ."' readonly></p>";
					}
					echo "<p>Doador: ".$doador->nome." Doou: ".$doacao->item_doacao." Na data de: "."<input type=\"date\" name=\"data\" value='" . $doacao->dataDoacao ."' readonly></p>";;
				}
			} else {
				echo "<h1>Nada encontrado!</h1>";
			}

		} else {
			echo "<h1>Nada encontrado!</h1>";
		}

	}

} else {
	echo "Exepecifique corretamente o que você deseja buscar.";
}


?>
