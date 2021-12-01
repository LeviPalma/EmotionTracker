<?php
  include_once "funcaoS.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $sensor = array();
  $sensor['idsen'] = $_POST['idsen'];
  $sensor['descricao'] = $_POST['descricao'];
  $sensor['nome'] = $_POST['nome'];
  $sensor['quantidade'] = $_POST['quantidade'];
  if ($sensor['idsen']==0) {
    insert($sensor);
  } else {
    update($sensor);
  }
  header('location: componentes.php');

 ?>
