<?PHP
  include "php/conexao.php";
?>
<!DOCTYPE html>
<hmtl>
  <head>
    <title>RideShare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/rideshare.css">
  </head>
  <body>
      <header id="header">
        <nav class="menu ">
          <ul class="row ">
            <li class="nav-link"><a href="index.php" class="menu-link"><img src="img/home.png"></a></li>
            <li class="nav-link"><a href="motoristas.php" class="menu-link">Motoristas</a></li>
            <li class="nav-link"><a href="passageiros.php" class="menu-link">Passageiros</a></li>
            <li class="nav-link"><a href="corridas.php" class="menu-link">Solicitar corrida</a></li>
          </ul>
        </nav>
      </header>
      <div class="col-md-12 forms">
        <div class="cor">
          <h3 class="center">CORRIDAS</h3>
          <hr class="col-md-12">
          <div class="col-md-12 mb-1">
            <form id="form" name="form" action="php/cad-corridas.php" method="post" class="row col-md-12">

              <?PHP

              echo"
              <div class='col-md-4'>
                <label for='motorista'>Escolha o motorista*</label>
                <select id='motorista' name='motorista' class='form-control'>
                  <option>Selecione um motorista</option>
                ";

                $result_motoristas = $conn->query("SELECT mot_cpf, mot_nome FROM rs_motoristas WHERE mot_status = 'ATIVO'");

                if($result_motoristas == 0){
                  echo "<script>
                  alert('Você não possui motoristas cadastrados');
                        </script>";
                }else{
                  for ($i = 0 ; $i < $conn->affected_rows; $i++){
                    $linha = $result_motoristas->fetch_array(MYSQLI_NUM);
                    $cpf = $linha[0];
                    $nome = $linha[1];

                    echo "<option value=$cpf>$nome</option>";
                  }
                }

              echo"</select>
                <span class='msg-erro msg-motorista'></span>
              </div>";
              echo"
              <div class='col-md-4'>
                <label for='passageiro'>Escolha o passageiro*</label>
                <select id='passageiro' name='passageiro' class='form-control'>
                <option>Selecione um motorista</option>
                ";

                  $result_passageiros = $conn->query("SELECT pas_cpf, pas_nome FROM rs_passageiros");

                  if($result_passageiros == 0){
                    echo "<script>
                    alert('Você não possui passageiros cadastrados');
                          </script>";
                  }else{
                    for ($i = 0 ; $i < $conn->affected_rows; $i++){
                      $linha = $result_passageiros->fetch_array(MYSQLI_NUM);
                      $cpf = $linha[0];
                      $nome = $linha[1];

                      echo "<option value=$cpf>$nome</option>";
                    }
                  }

              echo"
              </select>
              </div>";


              ?>
              <div class="col-md-4 mb-3">
                <label for="valor">Preço da corrida</label>
                <input type="numeric" name="valor" id="valor" placeholder="Ex 1.000,00" class="form-control">
              </div>
              <div class="col-md-4"></div>
              <input type="submit" value="CADASTRAR CORRIDA" onclick="return cad_corridas()" class="btn col-md-4 form-control float" name="btn_cad_corrida" id="btn_cad_corrida">
              <div class="col-md-4"></div>
            </form>
        </div>
      </div>
      <div class="col-md-12 forms">
        <div class="mot">
          <h3 class="center">CORRIDAS CADASTRADAS</h3>
          <hr class="col-md-12">
          <div id="form" name="form" action="" method="post" class="row col-md-12">
            <div class="col-md-3 mb-3"></div>
            <div class="col-md-6 mb-3" class="listar">
              <?php

                  $result_query = $conn->query("SELECT * FROM rs_corridas ORDER BY mot_cpf");
                  echo "<table class='table table-light'>
                          <thread class=''>
                            <tr>
                              <td scope='col'>Motorista</td>
                              <td scope='col'>Passageiros</td>
                              <td scope='col'>Preço</td>
                            </tr>
                          </thread>";
                  echo "<tbody>";
                  $result_rows = $conn->affected_rows;
                  $rows = $conn->affected_rows;
                  for($i = 0; $i < $rows; $i++){

                    $linha = $result_query->fetch_array(MYSQLI_NUM);

                    $mot_query = $conn->query("SELECT mot_nome FROM rs_motoristas WHERE mot_cpf = $linha[0]");
                    $linha_mot = $mot_query->fetch_array(MYSQLI_NUM);
                    $nome_mot = $linha_mot[0];

                    $pas_query = $conn->query("SELECT pas_nome FROM rs_passageiros WHERE pas_cpf = $linha[1]");
                    $linha_pas = $pas_query->fetch_array(MYSQLI_NUM);
                    $nome_pas = $linha_pas[0];

                    $valor = str_replace(".",",",$linha[2]);
                    


                    echo "<tr>
                            <td scope='col'>$nome_mot</td>
                            <td scope='col'>$nome_pas</td>
                            <td scope='col'>$valor</td>
                          </tr>
                        ";
                  }
                  echo "</tbody>";
                  echo "</table>";

              ?>
            </div>
            <div class="col-md-3 mb-3"></div>
            <br><br><br>
          </div>
      </div>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>
