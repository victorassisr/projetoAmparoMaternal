//LISTAR CAMPANHAS
	angular.module("campanhas", []);
	angular.module("campanhas").controller("campanhasCtrl", function($scope, $http){
		$http({
		method : "GET",
		url : "listarCampanhas.php",
		}).then(function sucesso(response){
			var str = String(response.data);
			$scope.campanhas = response.data;	
			console.log($scope.campanhas);
		});

    $scope.excluir = function(id, nome){
      var confirmacao = confirm("Deseja realmente excluir a campanha " + nome + "?");
      if(confirmacao === true){
        $http({
          method : "GET",
          url : "excluir.php?acao=excluir&id="+id,
        }).then(function(response){
          console.log(response.data);
          alert(response.data.resultado);
          location.href = "../campanha/lista.php";
          
        });
      } else {
        return;
      }
    }
	});

//LISTAR CAMPANHAS ATIVAS
  angular.module("campanhasAtivas", []);
  angular.module("campanhasAtivas").controller("campanhasAtivasCtrl", function($scope, $http){
    $http({
    method : "GET",
    url : "listarAtivas.php",
    }).then(function sucesso(response){
      var str = String(response.data);
      $scope.campanhas = response.data;       
      console.log($scope.campanhas);

    });
  
    $scope.excluir = function(id, nome){
      var confirmacao = confirm("Deseja realmente excluir a campanha " + nome + "?");
      if(confirmacao === true){
        $http({
          method : "GET",
          url : "excluir.php?acao=excluir&id="+id,
        }).then(function(response){
          console.log(response.data);
          alert(response.data.resultado);
          location.href = "../campanha/index.php";
          
        });
      } else {
        return;
      }
    }
  });
//EDITAR CAMPANHA
	angular.module('editarCampanha', []);
    angular.module('editarCampanha').controller('editarCampanhaCtrl', function($scope, $http, $filter) {

        $scope.submitForm = function() {
            $http({
              method  : 'POST',
              url     : 'editarCampanha.php',
             }).then(function(response){
              var result = (typeof response.data === 'string');
              if(result){
                if(response.data.match(/<b>Fatal error<\/b>/)){
                  alert("Erro ao processar a requisição!");
                  confirm("Erro FATAL, tente novamente.\nSe persistir, contate o administrador.");
                }else
                	location.href = "../campanha/";
              }                
            });
     	}
     });
//CADASTRAR CAMPANHA
angular.module("cadastroCampanha", []);
angular.module("cadastroCampanha").controller("cadastroCampanhaCtrl", function($scope, $http) {
  
$scope.cadastroCamp = function(){
        $http({
          method : "POST",
          url : "cadastrarCampanha.php",
        }).then(function(response){
          console.log(response.data);


        });
      } 
});
