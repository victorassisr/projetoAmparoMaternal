		var parametro = document.getElementById('parametro');
		var data = document.getElementById('data');
		var filtro = document.getElementById('filtro');

		data.addEventListener("change",function(){  //Se mudar a data..
			if(data.value != ""){ //Se a data for diferente de uma string vazia..
				parametro.style.display = "none"; //Oculta o parametro.
			} else { //Senão
				parametro.style.display = "inline"; //Mostra o campo parametro.
			}
		});

		parametro.addEventListener("keyup",function(){ //Se digitar algo no parametro
			var labelData = document.getElementById('labelData');
			var campoData = document.getElementById('data');
			if(parametro.value != ""){ //Se o parametro for diferente a uma string vazia
				labelData.style.display = "none"; //Oculta label da data
				campoData.style.display = "none"; //Oculta data.
			} else { //Caso contrário
				labelData.style.display = "inline"; //Mostra label data
				campoData.style.display = "inline"; //Mostra campo data.
			}
		});

		filtro.addEventListener("change",function(){ //Se alterar o filtro

			if(filtro.value == "DOACAO"){ //Se o valor do filtro for igual a 2 (Procura por data de doacoes)
				parametro.style.display = "none"; //Oculta o parametro
			} else { //Caso contrário
				parametro.style.display = "inline"; //Mostra o campo parametro
			}
		});