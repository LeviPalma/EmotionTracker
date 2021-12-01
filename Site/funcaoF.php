<?php
  function getConnection() {
    try {
      $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      $conexao = new PDO('mysql:host=localhost;dbname=tcc;port=3305;charset=utf8', "root", "", $opcoes);  
        return $conexao;
    } catch (PDOException $e) {
      echo($e);
      return null;
    }
  }

  function getAll() {
    $conexao = getConnection();
    $sql = 'SELECT * FROM funcao ORDER BY idfun ';
    $sentenca = $conexao->query($sql);
    $consulta = $sentenca->fetchAll();
    return $consulta;
  }

  function insert($funcao) {
    $conexao = getConnection();
    $sql = "INSERT INTO funcao (nome, descricao) VALUES (:nome, :descricao) ";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(":nome", $funcao['nome']);
    $sentenca->bindParam(":descricao", $funcao['descricao']);
    $sentenca->execute();
  }

  function delete($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM funcao WHERE idfun = :idfun";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(":idfun", $id);
    $sentenca->execute();
  }

  function getById($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM funcao WHERE idfun = :idfun";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(":idfun", $id);
    $sentenca->execute();
    $funcao = $sentenca->fetch();
    return $funcao;
  }

  function update($funcao) {
    $conexao = getConnection();
    $sql = "UPDATE funcao SET idfun=:idfun, nome=:nome, descricao=:descricao WHERE idfun=:idfun ";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(":idfun", $funcao['idfun']);
    $sentenca->bindParam(":nome", $funcao['nome']);
    $sentenca->bindParam(":descricao", $funcao['descricao']);
    $sentenca->execute();
  }

