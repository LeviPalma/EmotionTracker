<?php
  include_once "funcaoF.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $funcao = array();
  $funcao['idfun'] = $_POST['idfun'];
  $funcao['nome'] = $_POST['nome'];
  $funcao['descricao'] = $_POST['descricao'];
  if ($funcao['idfun']==0) {
    insert ($funcao);
  } else {
    update ($funcao);
  }
  header('location: codigos.php');

 ?>
