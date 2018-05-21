<?php

//$request = file_get_contents('php://input');

if(isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['email']) && isset($_POST['residencial']) && isset($_POST['tel1']) && isset($_POST['tel2']) && isset($_POST['nascimento']) && isset($_POST['dataCadastro']) && isset($_POST['tipoCliente']) && isset($_POST['tipoPessoa']) && isset($_POST['operadora']) && isset($_POST['turma']) && $_POST['nome'] != "" && $_POST['endereco'] != "" && $_POST['email'] != "" && $_POST['residencial'] != "" && $_POST['tel1'] != "" && $_POST['tel2'] != "" && $_POST['nascimento'] != "" && $_POST['dataCadastro'] != "" && $_POST['tipoCliente'] != "" && $_POST['tipoPessoa'] != "" && $_POST['operadora'] != "" && $_POST['turma'] != ""){
	require_once('conexao.php');

	$con = conexaoMySql();
	
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


	if($_POST['dia'] != "default"){
		$dia = $_POST['dia'];
	} else {
		$dia = 0;
	}

	if($_POST['mes'] != "default"){
		$mes = $_POST['mes'];
	} else{
		$mes = "nenhum";
	}

	$sql = "INSERT INTO doador(nome, endereco, email, telefoneResidencial, celular1, celular2, nascimento, dataCadastro, tipoDoador, doaDia, doaMes, tipoPessoa, operadora, turma) VALUES (:nome, :endereco, :email, :telRes, :cel1, :cel2, :nasc, :cad, :tipoCli, :doaDia, :doaMes, :tipoPessoa, :operadora, :turma)";

	$inserir = $con->prepare($sql);
	$inserir->bindValue(':nome',$nome);
	$inserir->bindValue(':endereco',$endereco);
	$inserir->bindValue(':email',$email);
	$inserir->bindValue(':telRes',$telResid);
	$inserir->bindValue(':cel1',$cel1);
	$inserir->bindValue(':cel2',$cel2);
	$inserir->bindValue(':nasc',$nascimento);
	$inserir->bindValue(':cad',$cadastro);
	$inserir->bindValue(':tipoCli',$tipoCliente);
	$inserir->bindValue(':doaDia',$dia);
	$inserir->bindValue(':doaMes',$mes);
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

} else {
	echo "Erro! Você não pode cadastrar sem antes ter preenchido todos os campos obrigatórios!";
}
?>