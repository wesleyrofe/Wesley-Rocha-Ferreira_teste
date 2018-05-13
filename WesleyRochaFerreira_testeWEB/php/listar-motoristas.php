<?php
  require_once("conexao.php");

  $query = "SELECT * FROM rs_motoristas";

  $conn->query($query);

  $result = $conn->affected_rows;

  for ($i = 0 ; $i < $conn->affected_rows; $i++){
    $linha = $conn->fetch_array(MYSQLI_NUM);
    $nome = $linha[1];
    $cpf = $linha[0];
    $dtnasc = $linha[3];
    $carro = $linha[4];
    $status = $linha[5];
    echo "<script>
            window.location.href='../motoristas.php';
          </script>";

    echo "<tr>
            <td>$nome</td>
            <td>$cpf</td>
            <td>$dtnasc</td>
            <td>$carro</td>
            <td>$status</td>
          </tr>";
  }
?>
