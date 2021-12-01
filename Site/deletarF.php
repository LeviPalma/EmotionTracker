<?php
  include_once "funcaoF.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $id = $_GET['id'];
  delete($id);
  header('location: codigos.php');
 ?>
