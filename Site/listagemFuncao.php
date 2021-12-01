<?php
  include_once "funcaoF.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $funcoes = getAll();
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Site de Notícias</title>
    <style media="screen">
      body {
        padding: 2rem;
      }
    </style>
  </head>
  <body>
    <?php
      include "menu.php";
     ?>

    <h1>Notícias</h1>
    <a class="btn btn-primary" href="frmFuncao.php" role="button">Nova Notícia</a>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Categoria</th>
          <th scope="col">Data</th>
          <th scope="col">Título</th>
          <th scope="col">Autor</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
            foreach ($funcoes as $funcao) {
              echo "
                <tr>
                  <td>{$funcao['idfun']}</td>
                  <td>{$funcao['nome']}</td>
                  <td>{$funcao['descricao']}</td>
                  <td>
                  <a class='btn btn-primary' href='editarF.php?id={$funcao['idfun']}' role='button'>*</a>
                    <a class='btn btn-danger' href='deletarF.php?id={$funcao['idfun']}' role='button'>-</a>

                  </td>
                </tr>";
            }
         ?>
      </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>
