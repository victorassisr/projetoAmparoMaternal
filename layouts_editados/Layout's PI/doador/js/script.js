var app = angular.module("listarDoadores", []);

app.controller("controladorListarDoadores", function($scope, $http){

	$http({
		method : "GET",
		url : "operacaoDoador.php?item=top10",
	}).then(function sucesso(response){
		var str = String(response.data);
		if(str.match(/Parse error/)){
			$scope.erro = "Houve um erro ao buscar os doadores, se o problema persistir, contate o administrador do site.";
		} else if(str.match(/ExceptionErro/)){
			$scope.erro = "Houve um erro!";
		} else if(str.match(/Fatal error/)){
			$scope.erro = "Houve um erro!";
		}else {
			$scope.doadores = response.data;
		}
	});

});


$(document).ready(function(){
    
    //Esconde o carregamento
    $(window).on("load", function(){
        $('#carregamento').fadeOut(1200);//1500 é a duração do efeito (1.5 seg)
    });
    
});

//Controlador cadastro de doadores

    //COLOCAR DATA NO INPUT DATA DE CADASTRO
	
	data = new Date(); //Cria uma nova data
	dia = data.getDate();	//Pega o dia
	mes = data.getMonth() + 1; //Pega o mes [0 a 11] soma mais 1 pra ficar certo.
	ano = data.getFullYear(); //Pega o ANO.

	if(dia < 10){	//Se o dia for menor q 10, coloca o 0 antes.
		dia = "0"+dia;
	}
	if(mes < 10){	//Se o mes for menor q 10, coloca o 0 antes.
		mes = "0"+mes;
	}

	dataAtual = '"' + ano + '-' + mes + '-' + dia + '"'; //Formata a data para ser valida.

	//FIM COLOCAR DATA NO INPUT DATA DE CADASTRO

    var cadastroDoadorApp = angular.module('cadastroDoadorApp', []);
    cadastroDoadorApp.controller('cadastroDoadorController', function($scope, $http) {
      $scope.doador = {};

      //Inicializacao das variaveis
      	$scope.doador.dataDeCadastro = new Date(); //Coloca a data validada no input.
      	$scope.doador.dataDeNascimento = new Date(); //Coloca a data validada no input.
      	$scope.doador.tipoDeDoador = "Fidelizado";
      	$scope.doador.dia = "1";
      	$scope.doador.mes = "Aleatório";

        $scope.submitForm = function() {

            $http({
              method  : 'POST',
              url     : 'cadastroDoador.php',
              data    : $scope.doador,
              headers : { 'Content-Type': 'application/x-www-form-urlencoded' },
             }).then(function(response){
             	//console.log(response.data.sucesso);
                if(response.data.erroNome != undefined){
                	$scope.erroNome = response.data.erroNome;
                } else if(response.data.erroBanco != undefined){
                	$scope.erroGeral = response.data.erroBanco;
                	console.log(response.data.erroBanco);
                }else {
	                if(response.data.sucesso != undefined){
	                	alert("Cadastrado com sucesso!");
	                	location.href="cadastrar.php";
	                }
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