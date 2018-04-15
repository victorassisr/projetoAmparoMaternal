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

} else {
	echo "Exepecifique corretamente o que você deseja buscar.";
}


?>
