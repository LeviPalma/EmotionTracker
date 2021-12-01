<?php
  include_once "funcaoS.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $sensores = getAll();
 ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Ultra&display=swap');
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emotion Tracker</title>
    <style media="screen">
      body {
        padding: 2rem;
      }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
  <header> 
    <div id="menu2-h">
      <center>Emotion-Tracker Host</center>
    </div> 
      <nav id="menu-h">
        <ul>
          <li>
              <br>
              <a class = "destaque" href="indexPrincipal.php" align = "left"><font color = "#232325">&nbsp;&nbsp;&nbsp;&nbsp;<b>E-TRACKER</b></font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li><a href="componentes.php">Componentes</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li><a href="codigos.php">Códigos</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li><a href="sobre.php">Sobre Nós </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </li><img class = "cubo" align = "right" src="img/cubo.png" width="240" height="144">
            </li>
          </ul>
      </nav>
    </header>
    <br><br><br><br><br><br><br><br><br><br><br>
    <p style= "text-align:center; color: #232325;">Componentes</p>
    <br>
    <table id="customers">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Quantidade</th>
          <th></th>
        </tr>
      <tbody>
        <?php
            foreach ($sensores as $sensor) {
              echo "
                <tr>
                  <td>{$sensor['idsen']}</td>
                  <td>{$sensor['nome']}</td>
                  <td>{$sensor['descricao']}</td>
                  <td>{$sensor['quantidade']}</td>
                  <td>
                  <a class='btn btn-primary' style = 'color: #5739ea; font-weight: bold;' href='editarS.php?id={$sensor['idsen']}' role='button'>Editar</a>
                  <br><br>
                  <a class='btn btn-danger' style = 'color: rgb(0,0,0);font-weight: bold;' href='deletarS.php?id={$sensor['idsen']}' role='button'>Apagar</a>

                  </td>
                </tr>";
            }
         ?>
      </tbody>
    </table>
    <br>
    <div class="box-R">
       <center><a class="btn btn-primary" href="frmSensor.php" role="button" style= "color: white;line-height: 50px;font-family: 'Ultra', serif;">Adicionar Sensor</a></center>
       </div>
    
    </body>
    </html>