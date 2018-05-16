var app = angular.module("listarDoadores", []);

app.controller("controladorListarDoadores", function($scope, $http){

	$http({
		method : "GET",
		url : "operacaoDoador.php?item=top10"
	}).then(function sucesso(response){
		$scope.doadores = response.data;
	}, function erro(erro){
		$scope.erro = "Houve um erro! Atualize a página. " + erro.statusText;
	});

});