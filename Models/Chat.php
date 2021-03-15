<?php

  require_once(ROOT_PATH .'/Models/Db.php');

  class Chat extends Db {
    private $table = 'chat';

    public function chatCreate(){
      $sql = "INSERT INTO chat(users_id, plans_id, message, post_time) VALUES (?,?,?,now())";
       $chatData = $_POST;
      $arr = [];
      $arr[] = $chatData['user'];
      $arr[] = $chatData['id'];
      $arr[] = $chatData['message'];
      $stmt = $this->dbh->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    }

    public function findAll($id){
      $sql = "SELECT
              (SELECT u.account_name FROM users u WHERE u.id = c.users_id) AS account_name,
              c.message,
              c.users_id
              FROM chat c
              WHERE c.plans_id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

  }

?>
