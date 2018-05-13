<?php
  require_once("conexao.php");

  $cpf = $_POST["motorista"];
  $status = $_POST['status'];
  $query = "UPDATE rs_motoristas rsm SET mot_status = '$status'  WHERE rsm.mot_cpf = '$cpf'";
  $nome = "SELECT mot_nome FROM rs_motoristas rsm WHERE rsm.mot_cpf = '$cpf' ";
  $conn->query($query);

  $result = $conn->affected_rows;

  if($result > 0){
    $nome = "SELECT mot_nome FROM rs_motoristas rsm WHERE rsm.mot_cpf = '$cpf' ";
    $conn->query($query);
    $result = $conn->affected_rows;
    if($status == "ATIVO"){
      echo "<script>
            window.location.href='../motoristas.php';
          </script>";
    }
    else{
      echo "<script>
            window.location.href='../motoristas.php';
          </script>";
    }
  }else{
    echo "<script>
          window.location.href='../motoristas.php';
          alert('Selecione um motorista e o status');
        </script>";
  }



?>
