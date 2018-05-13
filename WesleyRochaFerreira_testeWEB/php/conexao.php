<?PHP
		// Criando conexão com o server

		$conn = new mysqli("localhost","root","","rideshare");

		if($conn){
		} else {
			echo "Falha";
		}

?>
