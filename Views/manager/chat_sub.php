<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  // var_dump($_POST['id']);

  $id = $_POST['id'];
  $message = $_POST['message'];
  $user = $_POST['user'];
  $chatData = array("id" => $id, "message" => $message, "users_id" => $user );
  header("Content-type: application/json; charset=UTF-8");
  echo json_encode($chatData);
  // exit;

  if($_POST){
    $chat = new Controller();
    $params = $chat->chat($chatData);
  }

?>
