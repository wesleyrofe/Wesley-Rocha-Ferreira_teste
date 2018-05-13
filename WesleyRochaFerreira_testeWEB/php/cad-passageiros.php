<?php
  require_once("conexao.php");

  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $dtnasc = $_POST['dtnasc'];
  $sexo = $_POST['sexo'];

  $conn->query("INSERT INTO rs_passageiros (pas_cpf,
                                            pas_nome,
                                            pas_dtNasc,
                                            pas_sexo)
                VALUES ('$cpf',
                        '$nome',
                        '$dtnasc',
                        '$sexo')");

  $result = $conn->affected_rows;

  if($result > 0){
    echo "<script>
            window.location.href='../passageiros.php';
            alert('Dados inseridos com sucesso!');
          </script>";
  }



?>
