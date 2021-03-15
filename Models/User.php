<?php

  require_once(ROOT_PATH .'/Models/Db.php');

  class User extends Db {
    private $table = 'users';

    public function __construct($dbh = null) {
      parent::__construct($dbh);
    }

    public function createUser(){

      $sql = "SELECT * FROM users WHERE email = :email";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':email', $_POST['email']);
      $stmt->execute();
      $mailCheck = $stmt->fetch();
        $result = false;

        $sql = "INSERT INTO users (sports_id, add_id, account_name, email, password, name, birth, num, sex, work, created, del_flg)
                VALUES(?,?,?,?,?,?,?,?,?,?, now(),?)";
        $userData = $_POST;
        $arr = [];
        $arr[] = $userData['sports_id'];
        $arr[] = $userData['add_id'];
        $arr[] = $userData['account_name'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);
        $arr[] = $userData['name'];
        $arr[] = $userData['birth'];
        $arr[] = $userData['num'];
        $arr[] = $userData['sex'];
        $arr[] = $userData['work'];
        $arr[] = $userData['del_flg'];

        try{
          $stmt = $this->dbh->prepare($sql);
          $result = $stmt->execute($arr);
          return $result;
        } catch(\Exception $e){
          return $result;
        }
    }

    public function login(){

      try {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        $member = $stmt->fetch(PDO::FETCH_ASSOC);
      } catch (\Exception $e) {
        echo $e->getMessage() . PHP_EOL;
      }
      if (!isset($member['email'])) {
        $_SESSION['login_err'] = 'メールアドレス又はパスワードが間違っています。';
        header("Location: login.php");
        exit;
      }

      echo $_POST['password'];

      if(password_verify($_POST['password'], $member['password'])){
        $_SESSION['id'] = $member['id'];
        $_SESSION['account_name'] = $member['account_name'];
        if($member['del_flg'] == 1){
          header("Location: ../general/index.php");
          exit;
        }else if($member['del_flg'] == 0){
          header("Location: ../manager/index.php");
          exit;
        }else{
          header("Location: login.php");
          exit;
        }
      }else{
        $_SESSION['login_err'] = '無効なパスワードです。';
        header("Location: login.php");
      }
    }

    public function mail($email):Array{
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function keyCreate(){
      $sql = "INSERT INTO password_reset (email, create_key, create_time)
              VALUES (?, ?, now())";

      $email = $_POST;
      global $key;
      $key = md5(random_bytes(10));
      $arr = [];
      $arr[] = $email['email'];
      $arr[] = $key;
      $stmt = $this->dbh->prepare($sql);
      $stmt->execute($arr);
    }

    public function findById(){
      $sql = "SELECT u.account_name, u.name, u.email, u.birth, u.num,
             (SELECT a.name FROM address a WHERE u.add_id = a.id) AS add_name,
             u.sex, u.work,
             (SELECT s.name FROM sports s WHERE u.sports_id = s.id) AS sports_name
             FROM users u
             WHERE u.id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function findByUserId($id){
      $sql = "SELECT u.account_name, u.name, u.email, u.birth, u.num,
             (SELECT a.name FROM address a WHERE u.add_id = a.id) AS add_name,
             u.sex, u.work,
             (SELECT s.name FROM sports s WHERE u.sports_id = s.id) AS sports_name
             FROM users u
             WHERE u.id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function userUpdate(){
      $sql = "UPDATE users u
              SET
              account_name = :account_name,
              email = :email,
              name = :name,
              birth = :birth,
              num = :num,
              add_id = :add_id,
              work = :work,
              sex = :sex,
              sports_id = :sports_id,
              updated = now()
              WHERE id = :id";
      $user = $_POST;
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(':account_name', $user['account_name'], PDO::PARAM_STR);
      $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);
      $stmt->bindParam(':name', $user['name'], PDO::PARAM_STR);
      $stmt->bindParam(':birth', $user['birth'], PDO::PARAM_STR);
      $stmt->bindParam(':num', $user['num'], PDO::PARAM_STR);
      $stmt->bindParam(':add_id', $user['add_id'], PDO::PARAM_INT);
      $stmt->bindParam(':sex', $user['sex'], PDO::PARAM_STR);
      $stmt->bindParam(':work', $user['work'], PDO::PARAM_STR);
      $stmt->bindParam(':sports_id', $user['sports_id'], PDO::PARAM_INT);
      $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
      $stmt->execute();
    }

    public function userUpdateManager($id){
      $sql = "UPDATE users u
              SET
              account_name = :account_name,
              email = :email,
              name = :name,
              birth = :birth,
              num = :num,
              add_id = :add_id,
              work = :work,
              sex = :sex,
              sports_id = :sports_id,
              updated = now()
              WHERE id = :id";
      $user = $_POST;
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(':account_name', $user['account_name'], PDO::PARAM_STR);
      $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);
      $stmt->bindParam(':name', $user['name'], PDO::PARAM_STR);
      $stmt->bindParam(':birth', $user['birth'], PDO::PARAM_STR);
      $stmt->bindParam(':num', $user['num'], PDO::PARAM_STR);
      $stmt->bindParam(':add_id', $user['add_id'], PDO::PARAM_INT);
      $stmt->bindParam(':sex', $user['sex'], PDO::PARAM_STR);
      $stmt->bindParam(':work', $user['work'], PDO::PARAM_STR);
      $stmt->bindParam(':sports_id', $user['sports_id'], PDO::PARAM_INT);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }

    public function userDelete(){
      $sql = "DELETE FROM users WHERE id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
      $stmt->execute();
    }

    public function userListAll(){
      $sql = "SELECT u.id, u.account_name, u.email,
              (SELECT s.name FROM sports s WHERE s.id = u.sports_id) AS sports_name,
              (SELECT s.sports_img FROM sports s WHERE s.id = u.sports_id) AS sports_img,
              (SELECT a.name FROM address a WHERE a.id = u.add_id) AS add_name
              FROM users u";
      $stmt = $this->dbh->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    public function takeUserList($id){
      $sql = "SELECT u.account_name, u.sex,
              (SELECT s.name FROM sports s WHERE s.id = u.sports_id) AS sports_name,
              (SELECT s.sports_img FROM sports s WHERE s.id = u.sports_id) AS sports_img,
              (SELECT a.name FROM address a WHERE a.id = u.add_id) AS add_name
              FROM users u, take t, plans p
              WHERE u.id = t.users_id AND p.id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

  }

?>
