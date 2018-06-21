	
	angular.module("despesas", []);
	angular.module("despesas").controller("despesasCtrl", function($scope, $http){
		$http({
		method : "GET",
		url : "listaD.php",
		}).then(function sucesso(response){

			var str = String(response.data);

			console.log(response.data.notFound);
			if(response.data.notFound == undefined){
				$scope.not_found = false;
				$scope.despesas = response.data;
			}else{
				$scope.not_found = true;
				$scope.notFound = response.data.notFound;
			}
		});

	});