<?php
  include_once "funcaof.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $funcoes = getAll();
  
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
    <p style= "text-align:center; color: #232325;">Códigos</p>
    <br>
    <table id="customers">
  <tr>
    <th>ID</th>
    <th>Função</th>
    <th>Descrição</th>
    <th></th>
  </tr>
  <tbody>
        <?php
            foreach ($funcoes as $funcao) {
              echo "
                <tr>
                  <td>{$funcao['idfun']}</td>
                  <td>{$funcao['nome']}</td>
                  <td>{$funcao['descricao']}</td>
                  <td>
                  <a class='btn btn-primary' style = 'color: #5739ea; font-weight: bold;' href='editarF.php?id={$funcao['idfun']}' role='button'>Editar</a>
                  <br><br>
                    <a class='btn btn-danger' style = 'color: rgb(0,0,0);font-weight: bold; 'href='deletarF.php?id={$funcao['idfun']}' role='button'>Remover</a>

                  </td>
                </tr>";
            }
         ?>
      </tbody>
</table>
<br>
<div class="box-R">
       <center><a class="btn btn-primary" href="frmFuncao.php" role="button" style= "color: white;line-height: 50px;font-family: 'Ultra', serif;">Adicionar código</a></center>
       </div>
             
    </body>
    </html>