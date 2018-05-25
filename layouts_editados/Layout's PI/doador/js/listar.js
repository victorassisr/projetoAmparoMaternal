$(document).ready(function(){
    
    //Esconde o carregamento
    $(window).on("load", function(){
        $('#carregamento').fadeOut(1200);//1500 é a duração do efeito (1.5 seg)
    });
    
});

var app = angular.module("listarDoadores", []);

app.controller("controladorListarDoadores", function($scope, $http){

	$http({
		method : "GET",
		url : "operacaoDoador.php?acao=listar",
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