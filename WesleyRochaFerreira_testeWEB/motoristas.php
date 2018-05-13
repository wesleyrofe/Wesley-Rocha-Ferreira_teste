
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
          <div class="mot">
            <h3 class="center">CADASTRO DE MOTORISTAS</h3>
            <hr class="col-md-12">

            <form id="form" name="form" action="php/cad-motorista.php" method="post" class="row col-md-12">

              <div class="col-md-4"></div>

              <div class="col-md-4 mb-1">
                <label for="nome">Nome*</label>
                <input class="form-control"  type="" name="nome" id="nome">
                <span class="msg-erro msg-nome"></span>
              </div>

              <div class="row col-md-4"></div>
              <div class="col-md-4"></div>

              <div class="col-md-4 mb-1">
                <label for="mot_cpf">CPF*</label>
                <input class="form-control" type="text" name="cpf" id="cpf">
                <span class="msg-erro msg-cpf"></span>
              </div>

              <div class="row col-md-4"></div>
              <div class="col-md-4"></div>

              <div class="col-md-4 mb-1">
                <label for="dtnasc">Data de Nascimento*</label>
                <input class="form-control"  type="date" name="dtnasc" id="dtnasc">
                <span class="msg-erro msg-dtnasc"></span>
              </div>

              <div class="row col-md-4"></div>
              <div class="col-md-4"></div>

              <div class="col-md-4 mb-1">
                <label for="mod_carro">Modelo do Carro*</label>
                <input class="form-control" type="text" name="mod_carro" id="mod_carro">
                <span class="msg-erro msg-modcarro"></span>
              </div>

              <div class="row col-md-4"></div>
              <div class="col-md-4"></div>

              <div class="col-md-4 mb-3">
                <label for="sexo">Sexo*</label>
                <select id="sexo" name="sexo" class="form-control">
                  <option id="sexo" value="Masculino">Masculino</option>
                  <option id="sexo" value="Feminino">Feminino</option>
                </select>
              </div>

              <div class="row col-md-4"></div>
              <div class="col-md-4"></div>

              <input type="submit" value="CADASTRAR" onclick="return cad_motorista()" class="btn col-md-4 form-control float" name="btn_cad_motorista" id="btn_cad_motorista">

              <div class="col-md-4  "></div>
              </div>
            </form>
          </div>
      </div>
      <div class="col-md-12 forms">
        <div class="mot">
          <h3 class="center">FÉRIAS</h3>
          <hr class="col-md-12">
          <form id="form" name="form" action="php/muda_status.php" method="post" class="row col-md-12">
            <div class="col-md-4 mb-1">
              <label for="motorista">Escolha o motorista*</label>
              <select id="motorista" name="motorista" class="form-control">
                <option>Selecione um motorista</option>
                <?PHP

                  $result_array = $conn->query("SELECT mot_cpf, mot_nome FROM rs_motoristas");

                  if($result_array == 0){
                    echo "<script>
                    alert('Você não possui motoristas cadastrados');
                          </script>";
                  }else{
                    for ($i = 0 ; $i < $conn->affected_rows; $i++){
                      $linha = $result_array->fetch_array(MYSQLI_NUM);
                      $cpf = $linha[0];
                      $nome = $linha[1];

                      echo "<option value=$cpf>$nome</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="col-md-4 mb-1">
              <label for="status">Status*</label>
              <select id="status" name="status" class="form-control">
                <option>Selecione o status</option>
                <option value="ATIVO">ATIVAR</option>
                <option value="INATIVO">DESATIVAR</option>
              </select>
            </div>
            <div class="col-md-4 mb-1">
              <label for="btn_cad_motorista"></label>
              <input class="btn form-control" value="CONFIRMAR" type="submit" onclick=""  name="btn_confirma_status" id="btn_confirma_status">
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-12 forms">
        <div class="mot">
          <h3 class="center">MOTORISTAS CADASTRADOS</h3>
          <hr class="col-md-12">
          <div id="form" name="form" action="" method="post" class="row col-md-12">
            <div class="col-md-3 mb-3"></div>
            <div class="col-md-6 mb-3" class="listar">
              <?php

                $result_query = $conn->query("SELECT * FROM rs_motoristas ORDER BY mot_nome");

                  echo "<table class='table table-light'>
                          <thread class=''>
                            <tr>
                              <td scope='col'>Nome</td>
                              <td scope='col'>CPF</td>
                              <td scope='col'>Data Nascimento</td>
                              <td scope='col'>Modelo do carro</td>
                              <td scope='col'>Sexo</td>
                              <td scope='col'>Status</td>
                            </tr>
                          </thread>";
                  echo  "<tbody>";
                        for ($i = 0 ; $i < $conn->affected_rows; $i++){
                          $linha = $result_query->fetch_array(MYSQLI_NUM);
                          $nome = $linha[1];
                          $cpf = $linha[0];
                          $dtnasc = $linha[2];
                          $dia = substr($dtnasc,8,2);
                          $mes = substr($dtnasc,5,2);
                          $ano = substr($dtnasc,0,4);

                          $carro = $linha[3];
                          $sexo = $linha[4];
                          $status = $linha[5];

                          echo "<tr>
                                  <td scope='row'>$nome</td>
                                  <td scope='row'>$cpf</td>
                                  <td scope='row'>$dia/$mes/$ano</td>
                                  <td scope='row'>$carro</td>
                                  <td scope='row'>$sexo</td>
                                  <td scope='row'>$status</td>
                                </tr>";
                        }
                  echo "</tbody>";
                  echo "</table>";

                  $conn->close();

              ?>
            </div>
            <div class="col-md-3 mb-3"></div>
            <br><br><br>
          </div>
        </div>
      </div>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="js/jquery.js"></script>
  </body>
</html>
