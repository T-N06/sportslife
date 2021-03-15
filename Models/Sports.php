<?php

  require_once(ROOT_PATH .'/Models/Db.php');

  class Sports extends Db {
     private $table = 'sports';

     public function findAll(){
       $sql = "SELECT * FROM sports";
       $stmt = $this->dbh->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
     }

     public function findId($id){
       $sql = "SELECT * FROM sports WHERE id = :id";
       $stmt = $this->dbh->prepare($sql);
       $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
       return $result;
     }
  }

?>
