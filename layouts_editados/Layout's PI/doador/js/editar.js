var editarDoadorApp = angular.module('editarDoadorApp', []);
    editarDoadorApp.controller('editarDoadorController', function($scope, $http, $filter) {
      $scope.doador = {};


      //Inicializacao das variaveis
      	$scope.dataCadastro = { value : new Date() };//$filter('date')(data, 'yyyy-MM-dd'); //Coloca a data validada no input.
      	$scope.dataNascimento = { value : new Date(1990, 0, 1) }; //Coloca a data validada no input.
      	$scope.doador.tipoDeDoador = "Fidelizado";
      	$scope.doador.dia = "1";
      	$scope.doador.mes = "Aleatório";
        $scope.doador.pessoa = "Física";

        $scope.submitForm = function() {
            $scope.doador.dataDeNascimento = $filter('date')($scope.dataNascimento.value, 'yyyy-MM-dd');
            $scope.doador.dataDeCadastro = $filter('date')($scope.dataCadastro.value, 'yyyy-MM-dd');
            $http({
              method  : 'POST',
              url     : 'editarDoador.php',
              data    : $scope.doador,
              headers : { 'Content-Type': 'application/x-www-form-urlencoded' },
             }).then(function(response){
              var result = (typeof response.data === 'string');

              if(result){
                if(response.data.match(/<b>Fatal error<\/b>/)){
                  alert("Erro ao processar a requisição!");
                  confirm("Erro FATAL, tente novamente.\nSe persistir, contate o administrador.");
                } else {
                  alert("Erro não especificado.");
                }
              }
                //Mostra as mensagens de erro.
                if(response.data.erroNome != undefined){
                	$scope.erroNome = response.data.erroNome;
                }
                if(response.data.erroBanco != undefined){
                	$scope.erroGeral = response.data.erroBanco;
                }
                if(response.data.erroEndereco != undefined){
                  $scope.erroEndereco = response.data.erroEndereco;
                }
                if(response.data.erroEmail != undefined){
                  $scope.erroEmail = response.data.erroEmail;
                }
                if(response.data.erroDocumento != undefined){
                  $scope.erroDocumento = response.data.erroDocumento;
                }
	              if(response.data.sucesso != undefined){
	                alert("Cadastrado com sucesso!");
	                location.href="cadastrar.php";
	             }
            });
        } //Fim do submitForm()

        $scope.alteraTipoDoador = function(){
        	//Se caso os valores do tipo de doador mudar, oculta ou mostra as infos pertinentes.
        	if($scope.doador.tipoDeDoador == "Fidelizado"){
        		$scope.diaShow = true;
        		$scope.mesShow = false;
        		$scope.doador.mes = "Não definido";
        		$scope.doador.dia = "1";
        	} else {
	        	$scope.diaShow = false;
	        	$scope.doador.dia = 0;
	        }
	        
        	if($scope.doador.tipoDeDoador == "Exporádico"){
        		$scope.mesShow = true;
        		$scope.diaShow = false;
        		$scope.doador.dia = 0;
        		$scope.doador.mes = "Aleatório";
        	} else {
	        	$scope.mesShow = false;
	        	$scope.doador.mes = "Não definido";
	        }
			
        	if($scope.doador.tipoDeDoador == "Anual"){
        		$scope.doador.dia = 0;
        		$scope.doador.mes = "Aleatório";
        		$scope.mesShow = false;
   	     		$scope.diaShow = false;
        	}
        }

        //Validacao no carregamento da página
        if($scope.doador.tipoDeDoador == "Fidelizado"){
        	$scope.diaShow = true;
        	$scope.mesShow = false;
        	$scope.doador.mes = "Não definido";
        } else {
        	$scope.diaShow = false;
        	doador.dia = 0;
        }

        if($scope.doador.tipoDeDoador == "Exporádico"){
        	$scope.mesShow = true;
        	$scope.diaShow = false;
        	$scope.doador.dia = 0;
        	$scope.doador.mes = "Aleatório";
        } else {
	        $scope.mesShow = false;
	        $scope.doador.mes = "Não definido";
	    }

       	if($scope.doador.tipoDeDoador == "Anual"){
        	$scope.doador.dia = 0;
        	$scope.doador.mes = "Aleatório";
        	$scope.mesShow = false;
        	$scope.diaShow = false;
        }
        //Fim da validacao
    });