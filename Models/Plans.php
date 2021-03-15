<?php

  require_once(ROOT_PATH .'/Models/Db.php');

  class Plans extends Db {
    private $table = 'plans';

    public function createPlan(){

        $sql = "INSERT INTO plans (users_id, sports_id, status_id, name, day, created_time, location, plan_text, remarks)
                VALUES(?,?,?,?,?,?,?,?,?)";
        $planData = $_POST;
        $arr = [];
        $arr[] = $planData['users_id'];
        $arr[] = $planData['sports_id'];
        $arr[] = $planData['status_id'];
        $arr[] = $planData['name'];
        $arr[] = $planData['day'];
        $arr[] = $planData['created_time'];
        $arr[] = $planData['location'];
        $arr[] = h($planData['plan_text']);
        $arr[] = h($planData['remarks']);

          $stmt = $this->dbh->prepare($sql);
          $result = $stmt->execute($arr);
          return $result;
    }

    public function planListAll(){
      $sql = "SELECT p.id,
              (SELECT u.account_name FROM users u WHERE p.users_id = u.id) AS account_name,
              (SELECT s.name FROM sports s WHERE s.id = p.sports_id) AS sports_name,
              (SELECT s.sports_img FROM sports s WHERE s.id = p.sports_id) AS sports_img,
              p.location
              FROM plans p
              WHERE NOT p.users_id = :id
              ORDER BY p.day DESC";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    public function myPlanList(){
      $sql = "SELECT t.id, t.plans_id,
              (SELECT u.account_name FROM users u WHERE t.users_id = u.id) AS user_name,
              (SELECT s.name FROM sports s WHERE s.id = t.sports_id) AS sports_name,
              (SELECT s.sports_img FROM sports s WHERE s.id = t.sports_id) AS sports_img,
              t.location
              FROM take t WHERE t.take_user_id = :id
              ORDER BY t.day DESC";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    public function planListId(){
      $sql = "SELECT p.id,
              (SELECT u.account_name FROM users u WHERE p.users_id = u.id) AS user_name,
              (SELECT s.name FROM sports s WHERE s.id = p.sports_id) AS sports_name,
              (SELECT s.sports_img FROM sports s WHERE s.id = p.sports_id) AS sports_img,
              p.location
              FROM plans p
              WHERE users_id = :id
              ORDER BY p.day DESC";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    public function planDate(){
      $sql = "DELETE FROM plans WHERE day < now()";
      $stmt = $this->dbh->prepare($sql);
      $stmt->execute();
    }

    public function planDelete($id){
      $sql = "DELETE FROM plans WHERE id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }

    public function takeDelete($id){
      $sql = "DELETE FROM take WHERE plans_id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }

    public function myplanDelete($id){
      $sql = "DELETE FROM take WHERE id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }

    public function planById($id){
      $sql = "SELECT
              (SELECT s.name FROM sports s WHERE s.id = p.sports_id) AS sports_name,
              p.name,
              (SELECT u.account_name FROM users u WHERE p.users_id = u.id) AS user_name,
              (SELECT t.status FROM statuses t WHERE p.status_id = t.id) AS status_name,
              p.day, p.created_time, p.location, p.plan_text, p.remarks
              FROM plans p WHERE p.id = :id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    public function takeUser($id){
      $sql = "INSERT INTO take(plans_id, users_id, sports_id, day, location, take_user_id)
              SELECT p2.id,  p2.users_id, p2.sports_id, p2.day, p2.location, u.id
              FROM plans p2, users u
              WHERE p2.id = :p_id AND u.id = :u_id";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':u_id', $_SESSION['id'], PDO::PARAM_INT);
      $stmt->bindValue(':p_id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }

    public function eventUpdate($id){
      $sql = "UPDATE plans p
              SET p.sports_id = :sports_id, p.status_id = :status_id, p.name = :name, p.day = :day, p.created_time = :created_time, p.location = :location, p.plan_text = :plan_text, p.remarks = :remarks
              WHERE p.id = :id";
      $event = $_POST;
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindValue(':sports_id', $event['sports_id'], PDO::PARAM_INT);
      $stmt->bindValue(':status_id', $event['status_id'], PDO::PARAM_INT);
      $stmt->bindValue(':name', $event['name'], PDO::PARAM_STR);
      $stmt->bindValue(':day', $event['day'], PDO::PARAM_STR);
      $stmt->bindValue(':created_time', $event['created_time'], PDO::PARAM_STR);
      $stmt->bindValue(':location', $event['location'], PDO::PARAM_STR);
      $stmt->bindValue(':plan_text', $event['plan_text'], PDO::PARAM_STR);
      $stmt->bindValue(':remarks', $event['remarks'], PDO::PARAM_STR);
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
    }
  }

?>
