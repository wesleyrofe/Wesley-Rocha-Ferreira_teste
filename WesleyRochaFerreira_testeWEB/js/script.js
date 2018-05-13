function cad_motorista() {

			var nome = document.getElementById('nome').value;
			var cpf = document.getElementById('cpf').value;
			var dtNasc = document.getElementById('dtnasc').value;
			var mod_carro = document.getElementById('mod_carro').value;
			var sexo = document.getElementById('sexo').value;
			if(nome.length == 0){
				msg_nome = document.querySelector('.msg-nome');
				msg_nome.innerHTML= "Campo nome está vazio";
				msg_nome.style.display = "block";
				return false;
			}else{
				msg_nome = document.querySelector('.msg-nome');
				msg_nome.style.display = "none";
			}

			if (cpf.length != 11) {
				msg_cpf = document.querySelector('.msg-cpf');
				msg_cpf.innerHTML= "Campo cpf inválido!";
				msg_cpf.style.display = "block";
				return false;

			}else{
				msg_cpf = document.querySelector('.msg-cpf');
				msg_cpf.style.display = "none";
			}

			VerificaData(dtNasc);

			if (mod_carro.length == 0) {
				msg_modcarro = document.querySelector('.msg-modcarro');
				msg_modcarro.innerHTML= "Campo Modelo de Carro vazio!";
				msg_modcarro.style.display = "block";
				return false;
			}else{
				msg_modcarro = document.querySelector('.msg-modcarro');
				msg_modcarro.style.display = "none";
			}
			if (sexo.value == "Masculino") {
				sexo = "Masculino";
			}
			if (sexo.value == "Feminino") {
				sexo = "Feminino";
			}

}

function cad_passageiro() {

			var nome = document.getElementById('nome').value;
			var cpf = document.getElementById('cpf').value;
			var dtNasc = document.getElementById('dtnasc').value;
			var sexo = document.getElementById('sexo').value;

			if(nome.length == 0){
				msg_nome = document.querySelector('.msg-nome');
				msg_nome.innerHTML= "*Campo nome está vazio";
				msg_nome.style.display = "block";
				return false;
			}else{
				msg_nome = document.querySelector('.msg-nome');
				msg_nome.style.display = "none";
			}

			if (VerificaData(dtNasc)) {
				msg_dtnasc = document.querySelector('.msg-dtnasc');
				msg_dtnasc.style.display = "none";
			}else{
				msg_dtnasc = document.querySelector('.msg-dtnasc');
				msg_dtnasc.innerHTML= "Campo Data de nascimento vazio!";
				msg_dtnasc.style.display = "block";
				return false;
			}

			if (cpf.length != 11) {
				msg_cpf = document.querySelector('.msg-cpf');
				msg_cpf.innerHTML= "*Campo cpf inválido!";
				msg_cpf.style.display = "block";
				return false;

			}else{
				msg_cpf = document.querySelector('.msg-cpf');
				msg_cpf.style.display = "none";
			}


			if (sexo.value == "Masculino") {
				sexo = "Masculino";
			}else if (sexo.value == "Feminino") {
				sexo = "Feminino";
			}

}

function VerificaData(cData) {
	var data = cData;
	var tam = data.length;


	var dia = data.substr(0,2);
	var mes = data.substr (3,2);
	var ano = data.substr (6,4);

	if (tam != 10) {
		msg_dtnasc = document.querySelector('.msg-dtnasc');
		msg_dtnasc.innerHTML= "Campo Data de nascimento vazio!";
		msg_dtnasc.style.display = "block";
		return false;
	}


	if (ano < 1918)	{
		msg_dtnasc = document.querySelector('.msg-dtnasc');
		msg_dtnasc.innerHTML= "Campo Data de nascimento vazio!";
		msg_dtnasc.style.display = "block";
		return false;
	}
	if (ano > 2010)	{
		msg_dtnasc = document.querySelector('.msg-dtnasc');
		msg_dtnasc.innerHTML= "Campo Data de nascimento vazio!";
		msg_dtnasc.style.display = "block";
		return false;
	}

	switch (mes) {
		case '01':
			if  (dia <= 31)
				return (true);
			break;
		case '02':
			if  (dia <= 29)
				return (true);
			break;
		case '03':
			if  (dia <= 31)
				return (true);
			break;
		case '04':
			if  (dia <= 30)
				return (true);
				break;
		case '05':
			if  (dia <= 31)
				return (true);
			break;
		case '06':
			if  (dia <= 30)
				return (true);
			break;
		case '07':
			if  (dia <= 31)
				return (true);
			break;
		case '08':
			if  (dia <= 31)
				return (true);
			break;
		case '09':
			if  (dia <= 30)
				return (true);
			break;
		case '10':
			if  (dia <= 31)
				return (true);
			break;
		case '11':
			if  (dia <= 30)
				return (true);
			break;
		case '12':
			if  (dia <= 31)
				return (true);
			break;
	}	{
		msg_dtnasc = document.querySelector('.msg-dtnasc');
		msg_dtnasc.innerHTML= "Campo Data de nascimento vazio!";
		msg_dtnasc.style.display = "block";
		return false;
	}
	return true;
}
