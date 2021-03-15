<?php

  require_once(ROOT_PATH .'/Models/Db.php');

  class Add extends Db {
    private $table = 'address';

    public function findAll(){
      $sql = "SELECT * FROM address";
      $stmt = $this->dbh->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    public function findId($id){
      $sql = "SELECT * FROM address WHERE id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

  }

?>
