<?php
  require_once("conexao.php");
  setlocale(LC_ALL, "pt-Br");
  $mot_cpf = $_POST['motorista'];
  $pas_cpf = $_POST['passageiro'];
  $valor = str_replace('.','', $_POST['valor']);
  $valor = str_replace(',','.', $valor);
  $conn->query("INSERT INTO rs_corridas (mot_cpf,pas_cpf,cor_valor) VALUES ('$mot_cpf','$pas_cpf','$valor')");

  $result = $conn->affected_rows;

  if($result > 0){
    echo "<script>
            window.location.href='../corridas.php';
            alert('Corrida cadastrada com sucesso!');
          </script>";
  }else{
    if($mot_cpf.length == 0 || $pas_cpf.length == 0){    
        echo "<script>
          window.location.href='../corridas.php';
          alert('Selecione um motorista e o status');
        </script>";  
    }else if($valor == ""){
        echo "<script>
          window.location.href='../corridas.php';
          alert('Selecione um valor');
        </script>";
    }
  }



?>
