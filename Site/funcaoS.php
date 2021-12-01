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
    $sql = 'SELECT * FROM sensores ORDER BY idsen ';
    $sentenca = $conexao->query($sql);
    $consulta = $sentenca->fetchAll();
    return $consulta;
  }

  function insert($sensor) {
    $conexao = getConnection();
    $sql = "INSERT INTO sensores (nome, descricao, quantidade) VALUES (:nome, :descricao, :quantidade) ";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(":nome", $sensor['nome']);
    $sentenca->bindParam(":descricao", $sensor['descricao']);
    $sentenca->bindParam(":quantidade", $sensor['quantidade']);
    $sentenca->execute();
  }

  function delete($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM sensores WHERE idsen = :idsen";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(":idsen", $id);
    $sentenca->execute();
  }

  function getById($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM sensores WHERE idsen = :idsen";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(":idsen", $id);
    $sentenca->execute();
    $sensor = $sentenca->fetch();
    return $sensor;
  }

  function update($sensor) {
    $conexao = getConnection();
    $sql = "UPDATE sensores SET idsen=:idsen, nome=:nome, descricao=:descricao quantidade=:quantidade WHERE idsen=:idsen ";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(":idsen", $funcao['idsen']);
    $sentenca->bindParam(":nome", $funcao['nome']);
    $sentenca->bindParam(":descricao", $funcao['descricao']);
    $sentenca->bindParam(":quantidade", $funcao['quantidade']);
    $sentenca->execute();
  }