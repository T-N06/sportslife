<?php

  require_once(ROOT_PATH .'/Models/Db.php');

  class Password_reset extends Db {
    private $table = 'password_reset';

    public function findKey($reset){
      if($reset['password'] == $reset['password_sub']){
        $password = password_hash($reset['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE users u SET u.password = :password, u.updated = now() WHERE u.email = (SELECT p.email FROM password_reset p WHERE p.create_key = :create_key)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':create_key', $reset['create_key'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
      } else {
        $_SESSION['password_reset_err'] = 'パスワードが一致していません。';
        header("Location: password_create.php?create_key={$reset['create_key']}");
      }
    }
  }

?>
