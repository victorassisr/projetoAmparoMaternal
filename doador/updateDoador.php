<?php

	require_once('conexao.php');

	$con = conexaoMySql();
	
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$email = $_POST['email'];
	$telResid = $_POST['residencial'];
	$cel1 = $_POST['tel1'];
	$cel2 = $_POST['tel2'];
	$nascimento = $_POST['nascimento'];
	$cadastro = $_POST['dataCadastro'];
	$tipoCliente = $_POST['tipoCliente'];
	$pessoa = $_POST['tipoPessoa'];
	$operadora = $_POST['operadora'];
	$turma = $_POST["turma"];

	if($nome == ""){
		echo "Nome em branco";
	} else {
		echo "Nome definido!";
	}

	$sql = "UPDATE doador SET nome = :nome, endereco = :endereco, email = :email, telefoneResidencial = :telRes, celular1 = :cel1, celular2 = :cel2, nascimento = :nasc, dataCadastro = :cad, tipoDoador = :tipoCli, tipoPessoa = :tipoPessoa, operadora = :operadora, turma = :turma WHERE id_doador=:id";

	$inserir = $con->prepare($sql);
	$inserir->bindValue(':id',$id);
	$inserir->bindValue(':nome',$nome);
	$inserir->bindValue(':endereco',$endereco);
	$inserir->bindValue(':email',$email);
	$inserir->bindValue(':telRes',$telResid);
	$inserir->bindValue(':cel1',$cel1);
	$inserir->bindValue(':cel2',$cel2);
	$inserir->bindValue(':nasc',$nascimento);
	$inserir->bindValue(':cad',$cadastro);
	$inserir->bindValue(':tipoCli',$tipoCliente);
	$inserir->bindValue(':tipoPessoa',$pessoa);
	$inserir->bindValue(':operadora',$operadora);
	$inserir->bindValue(':turma',$turma);

	$inserir->execute();

	if($inserir->rowCount() > 0){
		echo "<h1>Cadastrado com sucesso!</h1>";
		?>
		<a href="<?php echo "http://".$_SERVER['SERVER_NAME'] ?>">Voltar</a>
		<?php
	} else {
		echo "<h1>Não foi possivel cadastrar!</h1>";
	}

	$con = null;
?>