<?php

  require_once(ROOT_PATH .'/Models/Db.php');

  class Status extends Db {
      private $table = 'statuses';

      public function findAll(){
        $sql = "SELECT * FROM statuses";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
      }

      public function findId($id){
        $sql = "SELECT * FROM statuses WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
      }
  }

?>
