<?php
  require_once("conexao.php");
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $dtnasc = $_POST['dtnasc'];
  $modCarro = $_POST['mod_carro'];
  $sexo = $_POST['sexo'];
  $status = "ATIVO";

  $conn->query("INSERT INTO rs_motoristas (mot_cpf,mot_nome,mot_dtnasc,mot_modCarro,mot_sexo,mot_status) VALUES ('$cpf','$nome','$dtnasc','$modCarro','$sexo','$status')");

  $result = $conn->affected_rows;

  if($result > 0){
    echo "<script>
            window.location.href='../motoristas.php';
            alert('Dados inseridos com sucesso!');
          </script>";
  }



?>
